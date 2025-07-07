<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.pages.home', ['activeLink' => 'home']);
})->name('client.pages.home');

Route::get('/home', function () {
    return redirect()->route('client.pages.home');
});

Route::get('/accomodation', function () {
    return view('client.pages.accomodation', ['activeLink' => 'accomodation']);
})->name('client.pages.accomodation');

Route::get('/gallery', function () {
    return view('client.pages.gallery', ['activeLink' => 'gallery']);
})->name('client.pages.gallery');

