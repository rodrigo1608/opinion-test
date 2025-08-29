<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('/user', UserController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
