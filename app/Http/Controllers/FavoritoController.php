<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFavoritoRequest;
use App\Models\Favorito;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return $user->favoritos();
    }

    public function negocios()
    {
        $user = Auth::user();

        $favoritos = Favorito::with('lugar')->where('user_id', $user->id)->whereHas('lugar', function ($query){
            $query->where('tipo', 'Negocio');
        })->get();

        return response()->json($favoritos);
    }

    public function lugaresTuristicos()
    {
        $user = Auth::user();

        $favoritos = Favorito::with('lugar')->where('user_id', $user->id)->whereHas('lugar', function ($query){
            $query->where('tipo', 'LugarTuristico');
        })->get();

        return response()->json($favoritos);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorito $favorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorito $favorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoritoRequest $request, Favorito $favorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorito $favorito)
    {
        //
    }
}
