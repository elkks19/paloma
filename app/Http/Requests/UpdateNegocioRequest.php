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
            'ubicacion' => 'json',
            'menu' => 'json',
        ];
    }

    private function verifyPassword(): bool
    {
        return password_verify($this->password, Auth::user()->password);
    }

    public function save(): Negocio 
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
            'menu' => $this->menu,
        ]);

        $negocio = $lugar->negocio()->get();

        return $negocio;
    }
}
