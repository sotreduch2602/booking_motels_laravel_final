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
            $validated['image_preview'] = $request->file('image_preview')->store('client_assets/img', 'public');
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
            if ($roomType->image_preview) {
                Storage::disk('public')->delete($roomType->image_preview);
            }
            $validated['image_preview'] = $request->file('image_preview')->store('client_assets/img', 'public');
        }

        $roomType->update($validated);

        return redirect()->route('admin.pages.roomTypes.index')->with('success', 'Room type updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(RoomTypes $roomType)
    {
        // Delete image if exists
        if ($roomType->image_preview) {
            Storage::disk('client_assets/img')->delete($roomType->image_preview);
        }
        $roomType->delete();

        return redirect()->route('admin.pages.roomTypes.index')->with('success', 'Room type deleted successfully.');
    }
}
