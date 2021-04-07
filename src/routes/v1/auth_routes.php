<?php

use Illuminate\Support\Facades\Route;


Route::prefix('auth/')->group(function () {
    Route::post('register', [\App\Http\Controllers\API\V01\Auth\AuthController::class, 'register'])->name('auth.register');
    Route::post('login', [\App\Http\Controllers\API\V01\Auth\AuthController::class, 'login'])->name('auth.login');
    Route::post('logout', [\App\Http\Controllers\API\V01\Auth\AuthController::class, 'logout'])->name('auth.logout');
    Route::get('user', [\App\Http\Controllers\API\V01\Auth\AuthController::class, 'user'])->name('auth.user');
});
