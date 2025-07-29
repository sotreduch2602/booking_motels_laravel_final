<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $roomTypes = RoomTypes::all();
        return view('admin.pages.admin.roomTypes', ['roomTypes' => $roomTypes,'title' => 'RoomTypesView']);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amenities' => 'nullable|string',
            'base_price' => 'required|numeric',
            'image_preview' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_preview')) {
            $file = $request->file('image_preview');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . date('Ymd_His'). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('client_assets/img'), $filename);
            $validated['image_preview'] = $filename;
        }

        RoomTypes::create($validated);

        return redirect()->route('admin.pages.roomTypes.index')->with('success', 'Room type created successfully.');
    }

    // Update the specified resource in storage.
    public function update(Request $request, RoomTypes $roomType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amenities' => 'nullable|string',
            'base_price' => 'required|numeric',
            'image_preview' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_preview')) {
            // Delete old image if exists
            if ($roomType->image_preview && file_exists(public_path('client_assets/img/' . $roomType->image_preview))) {
                unlink(public_path('client_assets/img/' . $roomType->image_preview));
            }
            $file = $request->file('image_preview');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . date('Ymd_His') .'.'. $file->getClientOriginalExtension();
            $file->move(public_path('client_assets/img'), $filename);
            $validated['image_preview'] = $filename;
        }

        $roomType->update($validated);

        return redirect()->route('admin.pages.roomTypes.index')->with('success', 'Room type updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(RoomTypes $roomType)
    {
        // Delete image if exists
        if ($roomType->image_preview && file_exists(public_path('client_assets/img/' . $roomType->image_preview))) {
            unlink(public_path('client_assets/img/' . $roomType->image_preview));
        }
        $roomType->delete();

        return redirect()->route('admin.pages.roomTypes.index')->with('success', 'Room type deleted successfully.');
    }
}
