<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuanLyHoBoiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::prefix('cms')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('dashboard');
    Route::post('/', [LoginController::class, 'login'])->name('login');
    Route::resource('quan-ly-ho-boi',QuanLyHoBoiController ::class);

});

