<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginRegisterController;

Route::get('/', [ImageController::class, 'indexwelcome'])->name('home');


Route::get('/upload', [ImageController::class, 'create'])->name('ads.create');
Route::post('/upload', [ImageController::class, 'store'])->name('ads.store');
// Route::post('/upload', [ImageController::class, 'checkmap'])->name('checkmap');

Route::get('/marketplace', [ImageController::class, 'index'])->name('marketplace');

Route::get('/ads/{id}', [ImageController::class, 'show'])->name('ads.show');

Route::get('/marketplace/search', [ImageController::class, 'search'])->name('ads.search');
Route::get('/marketplace/{category}',  [ImageController::class, 'showByCategory'])->name('ads.show.category');

Route::get('/error-page', [ImageController::class, 'errorPage'])->name('error.page');



Route::controller(ImageController::class)->group(function() {
    Route::get('/', [ImageController::class, 'indexwelcome'])->name('home');

    Route::get('/upload', [ImageController::class, 'create'])->name('ads.create');
    Route::post('/upload', [ImageController::class, 'store'])->name('ads.store');
    // Route::post('/upload', [ImageController::class, 'checkmap'])->name('checkmap');
    
    Route::get('/marketplace', [ImageController::class, 'index'])->name('marketplace');
    Route::get('/marketplace/{category}',  [ImageController::class, 'showByCategory'])->name('ads.show.category');
    Route::get('/marketplace/search', [ImageController::class, 'search'])->name('ads.search');
    
    Route::get('/ads/{id}', [ImageController::class, 'show'])->name('ads.show');
    
    Route::get('/error-page', [ImageController::class, 'errorPage'])->name('error.page');
    
});


    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');




Route::get('/about',function () {
    return view('about');
})->name('about');

Route::get('/contact',function () {
    return view('contact');
})->name('contact');
