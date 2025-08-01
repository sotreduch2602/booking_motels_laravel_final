<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingNotify;
use App\Mail\ClientBookingNotify;
use App\Models\Hotel;
use App\Models\Rooms;
use App\Models\RoomTypes;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class RoomsController extends Controller
{
    public function index(Request $request)
    {
        $hotel = Hotel::all();
        $roomTypes = RoomTypes::all();
        $roomQuery = Rooms::with(['RoomType', 'hotel'])->where('available','=','1')->orderBy('id','desc');

        // Exclude rooms from soft-deleted hotels
        $roomQuery->whereHas('hotel', function($query) {
            $query->whereNull('deleted_at');
        });

        if ($request->query('room_type')) {
            $roomTypeName = $request->query('room_type');

            $roomQuery->whereHas('roomType', function ($query) use ($roomTypeName) {
                $query->where('name', $roomTypeName);
            });
        }

        // You can add city filter
        if ($request->query('city')) {
            $city = $request->query('city');
            $roomQuery->whereHas('hotel', function ($q) use ($city) {
                $q->where('city', $city)->whereNull('deleted_at');
            });
        }

        // You can add budget filter
        if ($request->query('budget')) {
            $budget = $request->query('budget');
            $roomQuery->where('price_per_night', '<=', $budget);
        }

        // Paginate results
        $room = $roomQuery->paginate(5)->appends($request->query());

        return view('client.pages.room.room',[
            'title' => 'Rooms',
            'roomTypes' => $roomTypes,
            'room' => $room,
            'hotel' => $hotel
        ]);
    }
    public function detail(Rooms $room){
        // kiểm tra room soft deleted
        if (!$room->hotel || $room->hotel->deleted_at) {
            abort(404, 'Room not found or hotel has been removed.');
        }

        $hotel = Hotel::all();
        $roomTypes = RoomTypes::all();
        // Lấy reviews dạng paginate
        $reviews = $room->hotel->reviews()->orderByDesc('id')->with('Users')->paginate(5);
        return view('client.pages.room.room-detail',[
        'title' => 'Rooms',
        'roomTypes' => $roomTypes,
        'room' => $room,
        'hotel' => $hotel,
        'reviews' => $reviews
    ]);
    }

    public function ratingComment(Request $request, Rooms $room){

        try{
            DB::beginTransaction();

            // Lấy user hiện tại
            $user = Auth::user();

            // Validate dữ liệu gửi lên
            $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string|max:1000',
            ]);


            // Lưu Reviews
            Reviews::create([
                'user_id' => $user->id,
                'hotel_id' => $room->hotel_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);

            DB::commit();
            return back()->with('success', 'Đánh giá của bạn đã được gửi!');
        }
        catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function booking(Rooms $room){
        // Check if the room's hotel is soft deleted
        if (!$room->hotel || $room->hotel->deleted_at) {
            abort(404, 'Room not found or hotel has been removed.');
        }

        $hotel = Hotel::all();
        $roomTypes = RoomTypes::all();

        return view('client.pages.room.booking', [
            'title' => 'Booking',
            'hotel' => $hotel,
            'roomTypes' => $roomTypes,
            'room' => $room
        ]);
    }

    public function checkoutView(Request $request, Rooms $room)
    {
        // Check if the room's hotel is soft deleted
        if (!$room->hotel || $room->hotel->deleted_at) {
            abort(404, 'Room not found or hotel has been removed.');
        }

        try {
            $request->validate([
                'check_in' => 'required|date',
                'check_out' => 'required|date|after:check_in',
                'payment' => 'required',
                'email' => 'required|email',
            ]);

            $booking = [
                'name' => Auth::user()->full_name,
                'user_id' => Auth::user()->id,
                'email' => $request->email,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'city' => $request->city,
                'room_id' => $room->id,
                'room_type' => $request->room_type,
                'room_number' => $request->room_number,
                'payment' => $request->payment,
            ];

            return view('client.pages.room.checkout', [
                'title' => 'Checkout',
                'booking' => $booking,
                'room' => $room,
            ]);
        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Vui lòng kiểm tra lại thông tin đặt phòng!');
        } catch (Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function checkoutStore(Request $request)
    {
        try {
            DB::beginTransaction();

            $checkIn = Carbon::createFromFormat('m/d/Y h:i A', $request->input('check_in'))->format('Y-m-d H:i:s');
            $checkOut = Carbon::createFromFormat('m/d/Y h:i A', $request->input('check_out'))->format('Y-m-d H:i:s');

            $booking = new Booking();
            $booking->user_id = $request->input('user_id');
            $booking->room_id = $request->input('room_id');
            $booking->check_in = $checkIn;
            $booking->check_out = $checkOut;
            $booking->payment_status = $request->input('payment');
            $booking->total_price = $request->input('total_price');
            $booking->status = ($request->input('payment') === 'COD') ? 'pending' : 'completed';
            $booking->save();

            $room = Rooms::with('hotel')->find($request->input('room_id'));
            if ($room && $room->available == 1 && (!$room->hotel || !$room->hotel->deleted_at)) {
                $room->available = 0;
                $room->updated_at = now();
                $room->save();
            } else {
                DB::rollBack();
                if (!$room) {
                    return back()->with('error', 'Phòng không tồn tại!');
                } elseif ($room->hotel && $room->hotel->deleted_at) {
                    return back()->with('error', 'Khách sạn đã bị xóa!');
                } else {
                    return back()->with('error', 'Phòng không còn khả dụng!');
                }
            }

            if ($request->input('payment') == 'VNPay') {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $startTime = date("YmdHis");
                $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

                $vnp_TxnRef = $booking->id;
                $vnp_Amount = $booking->total_price * 100; // VNPay expects amount in VND * 100
                $vnp_Locale = 'vn';
                $vnp_BankCode = 'VNBANK';
                $vnp_IpAddr = $request->ip();
                $vnp_HashSecret = env('VNPAY_HASHSECRET');

                $inputData = [
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => env('VNPAY_TMNCODE'),
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
                    "vnp_OrderType" => "other",
                    "vnp_ReturnUrl" => env('VNPAY_RETURNURL'),
                    "vnp_TxnRef" => $vnp_TxnRef,
                    "vnp_ExpireDate" => $expire,
                    "vnp_BankCode" => $vnp_BankCode,
                ];

                ksort($inputData);
                $query = [];
                foreach ($inputData as $key => $value) {
                    $query[] = urlencode($key) . "=" . urlencode($value);
                }
                $queryString = implode('&', $query);

                $hashdataArr = [];
                foreach ($inputData as $key => $value) {
                    $hashdataArr[] = $key . "=" . $value;
                }
                $hashdata = implode('&', $hashdataArr);

                $vnp_Url = env('VNPAY_URL') . "?" . $queryString;

                if ($vnp_HashSecret) {
                    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                    $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
                }

                DB::commit(); // Commit before redirect

                return redirect()->to($vnp_Url);
            }

            DB::commit();


            Mail::to(users: Auth::user()->email)->send(new ClientBookingNotify($booking));
            Mail::to(users: 'sotreduch26022001@gmail.com')->send(new AdminBookingNotify($booking));

            return redirect()->route('client.pages.room')->with('success', 'Đặt phòng thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi đặt phòng: ' . $e->getMessage());
        }
    }
}
