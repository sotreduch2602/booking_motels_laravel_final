<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    //
    public function HotelView()
    {
        $hotels = Hotel::all();
        return view('admin.pages.admin.hotels', ['hotels' => $hotels ,'title' => 'HotelView']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'stars'          => 'required|integer|min:1|max:5',
            'street_address' => 'required|string|max:255',
            'city'           => 'required|string|max:100',
            'state'          => 'nullable|string|max:100',
            'postal_code'    => 'nullable|string|max:20',
            'country'        => 'required|string|max:100',
            'description'    => 'nullable|string',
            'amenities'      => 'nullable|string|max:255',
        ]);

        Hotel::create($validated);

        return redirect()->route('admin.pages.hotels')->with('success', 'Hotel created successfully!');
    }

    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'stars'          => 'required|integer|min:1|max:5',
            'street_address' => 'required|string|max:255',
            'city'           => 'required|string|max:100',
            'state'          => 'nullable|string|max:100',
            'postal_code'    => 'nullable|string|max:20',
            'country'        => 'required|string|max:100',
            'description'    => 'nullable|string',
            'amenities'      => 'nullable|string|max:255',
        ]);

        $hotel->update($validated);

        return redirect()->route('admin.pages.hotels')->with('success', 'Hotel updated successfully!');
    }
}
