<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware(['guest'])
    ->group(function () {
        Route::get('/register', [RegisterController::class, 'showRegisterForm'])
            ->name('register');
        Route::post('/register', [RegisterController::class, 'register']);

        Route::get('/login', [LoginController::class, 'showLoginForm'])
            ->name('login');
        Route::post('/login', [LoginController::class, 'login']);
    });

Route::middleware(['auth'])
    ->group(function () {
        Route::delete('/logout', [LoginController::class, 'logout'])
            ->name('logout');
    });
