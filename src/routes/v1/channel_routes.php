<?php

use Illuminate\Support\Facades\Route;

//Channel Routes
Route::middleware('can:channel management')->group(function (){

});
Route::get('channels', [\App\Http\Controllers\API\V01\Channel\ChannelController::class, 'all'])->name('channel.all');
Route::post('channel/store', [\App\Http\Controllers\API\V01\Channel\ChannelController::class, 'store'])->name('channel.store');
Route::put('channel/update', [\App\Http\Controllers\API\V01\Channel\ChannelController::class, 'update'])->name('channel.update');
Route::delete('channel/delete', [\App\Http\Controllers\API\V01\Channel\ChannelController::class, 'delete'])->name('channel.delete');
