<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.pages.home');
})->name('client.pages.home');

Route::get('/home', function () {
    return redirect()->route('client.pages.home');
});

Route::get('/accomodation', function () {
    return view('client.pages.accomodation');
})->name('client.pages.accomodation');




