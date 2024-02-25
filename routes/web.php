<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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

Route::get('/register', [RegisterUserController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterUserController::class,'store']);
Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout', [LoginController::class,'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/about',function () {
    return view('about');
})->name('about');

Route::get('/contact',function () {
    return view('contact');
})->name('contact');
