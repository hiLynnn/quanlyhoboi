<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\PoolServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::prefix('cms')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('dashboard');

    Route::resource('pools', PoolController::class);
    Route::resource('dich-vu', ServiceController::class);
    Route::resource('services', PoolServiceController::class);
    Route::resource('events', EventController::class);
    Route::resource('facilities', FacilitiesController::class);
    Route::resource('users', UserController::class);
    Route::resource('registrations', EventRegistrationController::class);
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers');
    Route::get('/{id}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/{id}', [CustomerController::class, 'update'])->name('customer.update');
});

