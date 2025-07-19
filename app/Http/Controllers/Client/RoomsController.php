<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Rooms;
use App\Models\RoomTypes;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index(){
        $hotel = Hotel::all();
        $roomTypes = RoomTypes::all();
        $room = Rooms::paginate(5); // Changed from 5 to 10 items per page
        // dd($room);
        // dd($roomTypes);

        return view('client.pages.room.room',[
            'title' => 'Room',
            'roomTypes' => $roomTypes,
            'room' => $room,
            'hotel' => $hotel
        ]);
    }

    public function detail(Rooms $room){


        return view('client.pages.room.room-detail',[
        'title' => 'Room Detail',
        'room' => $room,
    ]);
    }
}
