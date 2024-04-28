<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function nombre(){
        $user = User::find(11);
        return json_encode(['name' => $user->name]);
    }

    public function index()
    {
        return Auth::user();
        return User::with('lugar')->get();
        return User::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(): JsonResponse
    {
        $user = Auth::user();
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'createdAt' => $user->created_at
        ]);
    }


    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();
        
        return $user;
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return $user;
    }
}
