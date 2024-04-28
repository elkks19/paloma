<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Lugar;
use App\Models\LugarTuristico;

class StoreLugarTuristicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'password' => 'required|string',
            'ubicacion' => 'required|json',
        ];
    }

    private function verifyPassword(): bool
    {
        return password_verify($this->password, Auth::user()->password);
    }



    private function storeLugar(): Lugar
    {
        if(!$this->verifyPassword())
            return null;

        $lugar = Lugar::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'ubicacion' => $this->ubicacion,
        ]);

        return $lugar;
    }

    public function save(): Lugar 
    {
        $lugar = $this->storeLugar();
        
        if($lugar == null)
            return null;

        $lugarTuristico = Lugar::create([
            'lugar_id' => $lugar->id,
        ]);

        return $lugarTuristico;
    }
}
