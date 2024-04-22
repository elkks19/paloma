<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');

require __DIR__.'/auth.php';
