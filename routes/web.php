<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\RoomsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';

//Google SignIn
Route::get('/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/google/callback',[GoogleController::class, 'callback'])->name('google.callback');


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard1', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/404', function() {
    return view('client.pages.404', [
        'title' => '404 Not Found'
    ]);
})->name('client.pages.404');

//Client
//HomePage
Route::get('/', [HomeController::class,'index'])->name('client.pages.home');
Route::get('/home', function () {
    return redirect()->route('client.pages.home');
});

//RoomsPage
Route::get('/room', [RoomsController::class,'index'])->name('client.pages.room');
Route::get('/room/detail/{room}', [RoomsController::class,'detail'])->name('client.pages.detail');
Route::middleware('auth')->group(function () {
    Route::get('/room/booking/{room}', [RoomsController::class, 'booking'])->name('client.pages.booking');
    Route::post('/room/booking/{room}', [RoomsController::class, 'storeBooking'])->name('client.pages.booking.store');
});

//ServicePage
Route::get('/service', function () {
    return view('client.pages.service', [
        'title' => 'Service'
    ]);
})->name('client.pages.service');

//ContactPage
Route::get('/contact', function () {
    return view('client.pages.contact', [
        'title' => 'Contact'
    ]);
})->name('client.pages.contact');

//Admin
Route::get('/admin', [DashboardController::class,'index'])->name('admin.pages.index');
Route::get('/admin/booking', [DashboardController::class, 'bookingView'])->name('admin.pages.booking');
