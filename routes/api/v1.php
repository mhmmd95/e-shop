<?php

declare (strict_types = 1);

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\{Customer, Vendor, Business};
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

Route::middleware('auth:sanctum')->as('customers:')->prefix('customers')->group(function(){

    Route::post('/', Customer\StoreController::class)->name('store');
});

Route::middleware('auth:sanctum')->as('vendors:')->prefix('vendors')->group(function(){

    //vendors route //TODO: continue adding vendor business routes.
    Route::post('/', Vendor\StoreController::class)->name('store');
    Route::get('/', Vendor\IndexController::class)->name('index');

    //vendor's businesses
    Route::as('businesses:')->prefix('/{vendor:uuid}/businesses')->group(function() {

        Route::post('/', Business\StoreController::class)->name('store');
        Route::get('/', Business\IndexController::class)->name('index');
        Route::get('/{business:uuid}', Business\ShowController::class)->name('show');
    });
});
