<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicacionesRequest extends FormRequest
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
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'titulo.required' => 'El título es obligatorio',
            'titulo.max' => 'El título no puede contener mas de 255 caracteres',
            'descripcion.required' => 'La descripción es obligatoria',
            'imagen.required' => 'La Imagen es obligatoria'
        ];
    }
}
