<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        $accountUser = Socialite::driver('google')->user();

        // dd($accountUser);

        // Check user (including soft deleted)
        $user = User::withTrashed()->where('google_id', $accountUser->id)->first();

        if (!$user) {
            $existingUser = User::withTrashed()->where('email', $accountUser->email)->first();

            if ($existingUser) {
                if ($existingUser->trashed()) {
                    // User is soft deleted
                    return redirect()->route('home')->with('error', 'Tài khoản đã bị xóa vui lòng liên hệ admin');
                }
                // Email exists but no google_id, update the existing user
                $existingUser->update([
                    'google_id' => $accountUser->id,
                    'full_name' => $accountUser->name
                ]);
                $user = $existingUser;
            } else {
                // Create new user
                $user = User::create([
                    'google_id' => $accountUser->id,
                    'full_name' => $accountUser->name,
                    'email' => $accountUser->email,
                    'password' => Hash::make('password')
                ]);
            }
        } else {
            if ($user->trashed()) {
                return redirect()->route('client.pages.home')->with('error', 'Tài khoản đã bị xóa vui lòng liên hệ admin');
            }
        }

        Auth::login($user);

        return redirect(route('admin.pages.profile', absolute:false));
    }
}
