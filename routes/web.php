<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/sheets', function () {
    return view('sheets');
});

Route::post('/contact', [ContactController::class, 'submit']);

Route::resource('news', NewsController::class);


