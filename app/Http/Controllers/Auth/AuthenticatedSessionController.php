<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $token = $request->authenticate();

        $user = $request->user();

        $role = $user->getRoleNames()->first();

        if($role == null)
            return response()->json(['message' => 'Unauthorized'], 401);

        else if($role == 'user')
        {
            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token,
                'role' => $role,
            ]);
        }

        else if($role == 'lugar')
        {
            $menu = [];
            foreach ($user->lugar->menu as $menuId) {
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

            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token,
                'role' => $role,
                'lugar' => $user->lugar, 
                'menu' => $menu,
            ]);
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->user()->tokens()->delete();

        return response()->noContent();
    }
}
