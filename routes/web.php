<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\RoomsController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckIsAdmin;
use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';

//Google SignIn
Route::get('/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/google/callback',[GoogleController::class, 'callback'])->name('google.callback');

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
Route::post('/room/detail/{room}', [RoomsController::class,'ratingComment'])->name('client.pages.detail.rating');
Route::middleware('auth')->group(function () {
    Route::get('/room/booking/{room}', [RoomsController::class, 'booking'])->name('client.pages.booking');
    Route::get('/room/checkout/{room}', [RoomsController::class, 'checkoutView'])->name('client.pages.checkout');
    Route::post('/room/checkout/{room}/store', [RoomsController::class, 'checkoutStore'])->name('client.pages.checkout.store');
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

Route::middleware('auth')->group(function () {
    //User routes (cho phép cả user thường và admin)
    Route::get('/dashboard/review', [ReviewsController::class, 'reviewView'])->name('admin.pages.review');
    Route::get('/dashboard/booking', [BookingController::class, 'bookingView'])->name('admin.pages.booking');
    Route::get('/dashboard/booking/{booking}', [BookingController::class, 'bookingCancel'])->name('admin.pages.booking.cancel');
    Route::get('/dashboard/profile', [ProfileController::class,'profileView'])->name('admin.pages.profile');
    Route::patch('/dashboard/profile', [ProfileController::class, 'update1'])->name('admin.pages.profile.update');
});

//Admin routes (chỉ cho phép admin)
Route::middleware(['auth', CheckIsAdmin::class])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'dashboardView'])->name('admin.pages.dashboard');
    Route::get('/dashboard/analytic', [DashboardController::class,'analyticView'])->name('admin.pages.analytic');
});
