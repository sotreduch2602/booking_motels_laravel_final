<?php

use Illuminate\Support\Facades\Route;

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
    return view('client.pages.room',[
        'title' => 'Room'
    ]);
})->name('client.pages.room');

Route::get('/room/detail', function () {
    return view('client.pages.room-detail',[
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
});

Route::get('/contact', function () {
    return view('client.pages.contact', [
        'title' => 'Contact'
    ]);
})->name('client.pages.contact');




