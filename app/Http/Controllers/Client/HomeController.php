<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\RoomTypes;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $hotel = Hotel::all();
        $roomTypes = RoomTypes::all();
        $users = User::all();
        return view('client.pages.home', [
            'title' => 'Hotelier',
            'hotelsCount' => $hotel->count(),
            'roomTypesCount' => $roomTypes->count(),
            'usersCount' => $users->count()
        ]);
    }
}
