<?php

namespace App\Http\Requests;

use App\Models\Review;
use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contenido' => 'required|string',
            'calificacion' => 'required|numeric|min:1|max:5'
        ];
    }

    public function save(){
        Review::create([
            'contenido' => $this->contenido,
            'calificacion' => $this->calificacion,
            'user_id' => auth()->id(),
            'lugar_id' => $this->route('id')
        ]);
    }
}
