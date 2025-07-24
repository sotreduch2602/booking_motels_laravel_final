<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking; // Add this
use Illuminate\Support\Facades\Auth;

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
}
