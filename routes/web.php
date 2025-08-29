<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('/user', UserController::class);

Route::get('/dashboard', DashboardController::class)->name('dashboard');
