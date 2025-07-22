<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function bookingView(){
        return view('admin.pages.booking', [
            'title' => 'bookingView'
        ]);
    }
}
