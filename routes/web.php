<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\DashboardController;

/*
 * Public routes
 */
Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/license', 'license')->name('license');

/*
 * Authentication routes
 */
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
 * Users routes
 */
Route::middleware('auth')->group(function () {
    Route::resource('habits', HabitController::class);
    Route::post('/habits/{habit}/checkin',[HabitController::class, 'checkin'])->name('habits.checkin');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
 /*
 * Admin routes
 */
Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/users',[AdminController::class,'users'])->name('admin.users');
    Route::delete('/users/{user}',[AdminController::class,'destroy'])->name('admin.users.destroy');
});