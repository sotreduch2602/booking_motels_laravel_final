<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Booking;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function profileView(Request $request){
        return view('admin.pages.profile', [
            'title' => 'profileView',
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function update1(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        if (isset($validated['name'])) {
            unset($validated['name']);
        }

        $user->fill($validated);
        // Removed email_verified_at logic since column does not exist
        $user->save();
        return Redirect::route('admin.pages.profile')->with('status', 'profile-updated')->with('msg', "Updated Information Successfully");
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // dd(Booking::where('user_id', '=', $request->user()->id)
        //                 ->where('status', '=', 'pending')
        //                 ->get());
        
        //Booking Cancel
        try{
            DB::beginTransaction();
            //Booking Cancelled
            $bookings = Booking::where('user_id', '=', $request->user()->id)
                        ->where('status', '=', 'pending')
                        ->get();

            foreach ($bookings as $booking) {
                $booking->status = 'cancelled';
                $booking->updated_at = now();
                $booking->save();

                //Room change to Available
                $room = $booking->room;
                if ($room) {
                    $room->available = 1;
                    $room->updated_at = now();
                    $room->save();
                }
            }

            //User Deleteion
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            DB::commit();
            return Redirect::to('/')->with('success','Delete Account Successfully');
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->route('admin.pages.profile')->with('error', 'Có lỗi xảy ra khi xóa tài khoản');
        }
    }
}
