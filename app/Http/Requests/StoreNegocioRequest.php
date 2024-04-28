<?php

namespace App\Http\Requests;

use App\Models\Lugar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreNegocioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'password' => 'required|string',
            'ubicacion' => 'json'
        ];
    }

    private function verifyPassword(): bool
    {
        return password_verify($this->password, Auth::user()->password);
    }

    public function save($id): Lugar
    {
        if(!$this->verifyPassword())
            return null;

        $negocio = Lugar::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'user_id' => $id,
            'ubicacion' => [],
            'tipo' => 'Negocio',
        ]);
        
        if($negocio == null)
            return null;

        return $negocio;
    }
}
