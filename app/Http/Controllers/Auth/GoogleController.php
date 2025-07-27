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

        $user = User::updateOrCreate([
            'google_id' => $accountUser->id
        ], [
            'google_id' => $accountUser->id,
            'full_name' => $accountUser->name,
            'email' => $accountUser->email,
            'password' => Hash::make('password')
        ]);

        Auth::login($user);

        return redirect(route('admin.pages.profile', absolute:false));
    }
}
