<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Rooms;
use App\Models\RoomTypes;
use Illuminate\Http\Request;

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

    public function storeBooking(Request $request, Rooms $room) {
        // Xử lý logic booking tại đây
        return redirect()->back()->with('success', 'Booking successful!');
    }
}
