<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';

//Google SignIn
Route::get('/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/google/callback',[GoogleController::class, 'callback'])->name('google.callback');


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Client
Route::get('/', function () {
    return view('client.pages.home', [
        'title' => 'Home'
    ]);
})->name('client.pages.home');

Route::get('/404', function() {
    return view('client.pages.404', [
        'title' => '404 Not Found'
    ]);
})->name('client.pages.404');

Route::get('/home', function () {
    return redirect()->route('client.pages.home');
});

Route::get('/room', function () {
    return view('client.pages.room.room',[
        'title' => 'Room'
    ]);
})->name('client.pages.room');

Route::get('/room/detail', function () {
    return view('client.pages.room.room-detail',[
        'title' => 'Room Detail'
    ]);
})->name('client.page.detail');

Route::get('/booking', function () {
    return view('client.pages.booking', [
        'title' => 'Booking'
    ]);
})->name('client.pages.booking');

Route::get('/service', function () {
    return view('client.pages.service', [
        'title' => 'Service'
    ]);
})->name('client.pages.service');

Route::get('/contact', function () {
    return view('client.pages.contact', [
        'title' => 'Contact'
    ]);
})->name('client.pages.contact');

//Admin
