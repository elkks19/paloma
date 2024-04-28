<?php

use App\Http\Controllers\FavoritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LugarTuristicoController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\ProductoController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(LugarTuristicoController::class)->group(function () {
    // RUTAS PARA LUGARES TURISTICOS
        Route::get('/lugaresTuristicos', 'index');
        Route::get('/lugaresTuristicos/info/{id}', 'show');
        Route::put('/lugaresTuristicos/update', 'update');
        Route::delete('/lugaresTuristicos/delete', 'destroy');
    });

    // RUTAS PARA NEGOCIOS
    Route::controller(NegocioController::class)->group(function () {
        Route::get('/negocios', 'index');
        Route::get('/negocios/info', 'show');
        Route::get('/negocios/isFavorito/{id}', 'isFavorito');
        Route::put('/negocios/update', 'update');
        Route::post('/negocios/register', 'register');
        Route::delete('/negocios/delete', 'destroy');
    });

    // RUTAS PARA LOS FAVORITOS
    Route::controller(FavoritoController::class)->group(function (){
        Route::get('/favoritos/negocios', 'negocios');
        Route::get('/favoritos/lugaresTuristicos', 'lugaresTuristicos');

        Route::post('/favoritos/add', 'store');
    });

    // RUTAS PARA LOS PRODUCTOS
    // Route::controller(ProductoController::class)->group(function (){
    //     Route::get();
    // })
});
