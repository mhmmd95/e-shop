<?php

declare (strict_types = 1);

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->as('auth:')->group(function() {

    Route::middleware('guest')->group(function() {

        Route::post('/register', 'register')->name('register')->middleware('guest');
        Route::post('/login', 'login')->name('login');
    });

    Route::middleware('auth:sanctum')->group(function() {

        Route::get('/me', 'me')->name('me');
        Route::post('/logout', 'logout')->name('logout');
        Route::post('/logout-all-sessions', 'logoutAll')->name('logoutAll');
    });
});
