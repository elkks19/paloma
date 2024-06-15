<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Models\Lugar;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Negocio;

class UpdateNegocioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'string|max:100',
            'descripcion' => 'string',
            'contacto' => 'string',
            'ubicacion' => 'json',
            'menu' => 'json',
        ];
    }

    public function save()
    {
        $user = auth()->user();
        $lugar = $user->lugar;

        $lugar->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'contacto'  => $this->contacto,
            'ubicacion' => $this->ubicacion,
            'menu' => $this->menu,
        ]);

        return $lugar;
    }
}
