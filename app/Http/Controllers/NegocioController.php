<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNegocioRequest;
use App\Http\Requests\UpdateNegocioRequest;
use App\Models\Lugar;
use App\Models\Producto;


class NegocioController extends Controller
{
    public function index()
    {
        $lugares = Lugar::where('tipo', 'Negocio')->get();
        $user = Auth::user();

        if ($user == null)
            return response()->json(['message' => 'Unauthorized'], 401);

        $favoritos = $user->favoritos()->get();

        $response = [];


        foreach ($lugares as $lugar) {
            $menu = [];

            foreach ($lugar->menu as $menuId) {
                $prod = Producto::find($menuId);

                if ($prod == null)
                    continue;

                $menu[] = [
                    'id' => $prod->id,
                    'nombre' => $prod->nombre,
                    'precio' => $prod->precio,
                    'descripcion' => $prod->descripcion
                ];
            }

            $response[] = [
                'id' => $lugar->id,
                'nombre' => $lugar->nombre,
                'descripcion' => $lugar->descripcion,
                'ubicacion' => $lugar->ubicacion,
                'menu' => $menu,
                'calificacion' => $lugar->calificacion,
                'contacto' => $lugar->contacto,
                'favorito' => $favoritos->contains($lugar->id)
            ];
        }
        return response()->json($response, 200);
    }

    public function register(StoreNegocioRequest $request)
    {
        $user = Auth::user();
        $registeredNegocio = $request->save($user->id);

        if($registeredNegocio == null)
            return response()->json(['message' => 'Unauthorized'], 401);

        return response()->json($registeredNegocio, 201);
    }

    public function show()
    {
        $user = Auth::user();
        $lugar = $user->lugar()->get();

        if($lugar == null)
            return response()->json(['message' => 'Unauthorized'], 401);

        return response()->json($lugar, 200);
    }

    public function update(UpdateNegocioRequest $request)
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
        $negocio = $lugar->negocio()->get();

        $negocio->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }

    public function isFavorito(int $id)
    {
        $user = Auth::user();
        $lugar = Lugar::find($id);

        if($lugar == null)
            return response()->json(['message' => 'Unauthorized'], 401);

        return $user->favoritos()->contains($lugar);
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
