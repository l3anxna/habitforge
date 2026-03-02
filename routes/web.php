<?php

use App\Http\Controllers\HomeController;

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
