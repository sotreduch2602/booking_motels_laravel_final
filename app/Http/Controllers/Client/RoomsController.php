<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Rooms;
use App\Models\RoomTypes;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class RoomsController extends Controller
{
    public function index(Request $request)
    {
        $hotel = Hotel::all();
        $roomTypes = RoomTypes::all();
        $roomQuery = Rooms::with('RoomType')->where('available','=','1')->orderBy('id','desc');

        if ($request->query('room_type')) {
            $roomTypeName = $request->query('room_type');

            $roomQuery->whereHas('RoomType', function ($query) use ($roomTypeName) {
                $query->where('name', $roomTypeName);
            });
        }

        // You can add city filter
        if ($request->query('city')) {
            $city = $request->query('city');
            $roomQuery->whereHas('hotel', function ($q) use ($city) {
                $q->where('city', $city);
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
        $hotel = Hotel::all();
        $roomTypes = RoomTypes::all();

        return view('client.pages.room.room-detail',[
        'title' => 'Rooms',
        'roomTypes' => $roomTypes,
        'room' => $room,
        'hotel' => $hotel
    ]);
    }

    public function booking(Rooms $room){
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
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'payment' => 'required',
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

            $room = Rooms::find($request->input('room_id'));
            if ($room && $room->available == 1) {
                $room->available = 0;
                $room->save();
            } else {
                DB::rollBack();
                return back()->with('error', 'Phòng không còn khả dụng!');
            }

            DB::commit();

            return redirect()->route('client.pages.room')->with('success', 'Đặt phòng thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi đặt phòng: ' . $e->getMessage());
        }
    }
}
