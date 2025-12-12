<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\Admin\SheetController as AdminSheetController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
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

Route::post('/contact', [ContactController::class, 'submit']);

Route::get('/sheets', function () {
    return view('sheets');
});

Route::resource('news', NewsController::class);

Route::resource('sheets', SheetController::class);
Route::get('sheet-search', [SheetController::class, 'search'])->name('sheet.search');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::resource('sheets', AdminSheetController::class);
    Route::resource('news', AdminNewsController::class);
});

