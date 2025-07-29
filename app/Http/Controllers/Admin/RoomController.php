<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Hotel;
use App\Models\RoomTypes;

class RoomController extends Controller
{
    // Display a listing of the rooms
    public function index()
    {
        $rooms = Rooms::withTrashed()->orderBy('id', 'desc')->get(); // includes soft-deleted
        $hotels = Hotel::all();
        $roomTypes = RoomTypes::all();
        $title = 'RoomView';

        return view('admin.pages.admin.room', compact('rooms', 'hotels', 'roomTypes', 'title'));
    }

    // Store a newly created room in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id'        => 'required|integer|exists:hotels,id',
            'room_number'     => 'required|string|max:255',
            'room_type_id'    => 'required|integer|exists:room_types,id',
            'price_per_night' => 'required|numeric|min:0',
            'max_people'      => 'required|integer|min:1',
            'description'     => 'nullable|string',
            'available'       => 'required|boolean',
        ]);

        Rooms::create($validated);

        return redirect()->route('admin.pages.rooms.index')->with('success', 'Room created successfully.');
    }

    // Update the specified room in storage
    public function update(Request $request, $id)
    {
        $room = Rooms::withTrashed()->findOrFail($id);

        $validated = $request->validate([
            'hotel_id'        => 'required|integer|exists:hotels,id',
            'room_number'     => 'required|string|max:255',
            'room_type_id'    => 'required|integer|exists:room_types,id',
            'price_per_night' => 'required|numeric|min:0',
            'max_people'      => 'required|integer|min:1',
            'description'     => 'nullable|string',
            'available'       => 'required|boolean',
        ]);

        $room->update($validated);

        return redirect()->route('admin.pages.rooms.index')->with('success', 'Room updated successfully.');
    }

    // Remove the specified room from storage (soft delete)
    public function destroy($id)
    {
        $room = Rooms::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.pages.rooms.index')->with('success', 'Room deleted successfully.');
    }

    // Restore the specified room from storage
    public function restore($id)
    {
        $room = Rooms::withTrashed()->findOrFail($id);
        $room->restore();

        return redirect()->route('admin.pages.rooms.index')->with('success', 'Room restored successfully.');
    }
}
