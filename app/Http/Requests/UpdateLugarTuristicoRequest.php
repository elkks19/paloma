<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\LugarTuristico;

class UpdateLugarTuristicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'string|max:100',
            'descripcion' => 'string',
            'ubicacion' => 'json',
        ];
    }

    private function verifyPassword(): bool
    {
        return password_verify($this->password, Auth::user()->password);
    }

    public function save(): LugarTuristico
    {
        if(!$this->verifyPassword())
            return null;

        $user = Auth::user();
        $lugar = $user->lugar()->get();

        if($lugar == null)
            return null;

        $lugar->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'ubicacion' => $this->ubicacion,
        ]);

        $lugarTuristico = $lugar->negocio()->get();

        return $lugarTuristico;
    }
}
