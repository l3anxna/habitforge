<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

/*
 * Public routes
 */
Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

/*
 * Authentication routes
 */
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');

/*
 * Users routes
 */

 /*
 * Admin routes
 */