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

        return view('admin.pages.booking', [
            'title' => 'bookingView',
            'bookings' => $bookings
        ]);
    }

    public function bookingCancel(Booking $booking){
        try{
            DB::beginTransaction();

            $booking->status = 'cancelled';
            $booking->save();

            DB::commit();
            return redirect()->route('admin.pages.booking')->with('msg', 'Huỷ đặt phòng thành công');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('admin.pages.booking')->with('error', 'Có lỗi xảy ra khi huỷ đặt phòng');
        }
    }
}
