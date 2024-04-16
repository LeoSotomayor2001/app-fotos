<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest
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
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:twitter,editar-perfil,Twitter,facebook,Facebook'],
            'email'=> ['required','unique:users,email,'.auth()->user()->id,'max:60'],
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'El username es requerido',
            'username.unique' => 'Ese username ya existe',
            'username.min' => 'El username debe tener al menos 3 caracteres',
            'username.max' => 'El username debe tener máximo 20 caracteres',
            'username.not_in' => 'Ese username no es válido',
            'email.required' => 'El email es requerido',
            'email.unique' => 'Ese email ya existe',
            'email.max' => 'El email debe contener maximo 60 caracteres'
        ];
    }
}
