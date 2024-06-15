<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLugarTuristicoRequest;
use App\Http\Requests\UpdateLugarTuristicoRequest;
use App\Models\Lugar;

class LugarTuristicoController extends Controller
{
    public function index()
    {
        $lugares = Lugar::where('tipo', 'LugarTuristico')->get();
        $user = Auth::user();

        if ($user == null)
            return response()->json(['message' => 'Unauthorized'], 401);

        $favoritos = $user->favoritos()->get();

        $response = [];
        foreach ($lugares as $lugar) {
            $response[] = [
                'id' => $lugar->id,
                'nombre' => $lugar->nombre,
                'descripcion' => $lugar->descripcion,
                'ubicacion' => $lugar->ubicacion,
                'menu' => $lugar->menu,
                'calificacion' => $lugar->calificacion,
                'favorito' => $favoritos->contains($lugar->id),
            ];
        }
        return response()->json($response, 200);
    }

    public function store(StoreLugarTuristicoRequest $request)
    {
        $lugarTuristico = $request->save();

        if($lugarTuristico == null)
            return response()->json(['message' => 'Unauthorized'], 401);

        return response()->json($lugarTuristico, 201);
    }

    public function show(int $id)
    {
        $lugar = Lugar::find($id);

        if($lugar == null)
            return response()->json(['message' => 'Unauthorized'], 401);

        return response()->json($lugar, 200);
    }

    public function update(UpdateLugarTuristicoRequest $request)
    {
        if(!$this->verifyToken())
            return response()->json(['message' => 'Unauthorized'], 401);

        $lugar = $request->save();
        if($lugar == null)
            return response()->json(['message' => 'Unauthorized'], 401);

        return response()->json($lugar, 200);
    }

    public function destroy()
    {
        if(!$this->verifyToken())
            return response()->json(['message' => 'Unauthorized'], 401);

        $user = Auth::user();
        $lugar = $user->lugar()->get();
        $lugarTuristico = $lugar->negocio()->get();

        $lugarTuristico->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }

    private function verifyToken()
    {
        $user = Auth::user();
        $lugar = $user->lugar()->get();
        if($lugar == null)
            return false;

        return $user->tokenCan('negocio:'.$lugar->nombre);
    }
}
