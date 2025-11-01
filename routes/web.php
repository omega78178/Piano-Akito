<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SheetController;
use App\Models\News;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $news = News::all();
    return view('welcome', compact('news'));
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

Route::resource('sheets', SheetController::class);
Route::get('sheet-search', [SheetController::class, 'search'])->name('sheet.search');



