<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking; // Add this
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function bookingView(){
        $userId = Auth::user()->id;

        // dd($userId);

        $bookings = Booking::with(['room'])
            ->where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->get();

        // dd($bookings);

        return view('admin.pages.booking', [
            'title' => 'bookingView',
            'bookings' => $bookings
        ]);
    }

    public function bookingCancel(Booking $booking){
        try{
            DB::beginTransaction();

            $booking->status = 'cancelled';
            $booking->updated_at = now();
            $booking->save();

            //! Cập nhật lại trạng thái phòng về available = 1
            $room = $booking->room; //! Lấy phòng liên quan
            if ($room) {
                $room->available = 1;
                $room->updated_at = now();
                $room->save();
            }

            DB::commit();
            return redirect()->route('admin.pages.booking')->with('msg', 'Huỷ đặt phòng thành công');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('admin.pages.booking')->with('error', 'Có lỗi xảy ra khi huỷ đặt phòng');
        }
    }
}
