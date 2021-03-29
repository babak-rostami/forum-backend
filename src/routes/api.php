<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1/')->group(function () {
    Route::prefix('auth/')->group(function () {
        Route::post('register', [\App\Http\Controllers\API\V01\Auth\AuthController::class, 'register'])->name('auth.register');
        Route::post('login', [\App\Http\Controllers\API\V01\Auth\AuthController::class, 'login'])->name('auth.login');
        Route::post('logout', [\App\Http\Controllers\API\V01\Auth\AuthController::class, 'logout'])->name('auth.logout');
        Route::get('user', [\App\Http\Controllers\API\V01\Auth\AuthController::class, 'user'])->name('auth.user');
    });


});

