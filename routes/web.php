<?php

use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/testroute', function () {
    $name = "Akito Piano";

    Mail::to('alex2205nguyen@gmail.com')->send(new MyTestEmail($name));
});
