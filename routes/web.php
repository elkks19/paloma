<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;


Route::get('/users/nombre', [UserController::class, 'nombre']);


Route::controller(UserController::class)->group(function () {
//     Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/info', 'show');
    Route::post('/users/update', 'update');
    Route::delete('/users/delete', 'destroy');
    // });
    Route::get('/users/prueba', 'prueba');
});


require __DIR__.'/auth.php';
require __DIR__.'/lugares.php';
