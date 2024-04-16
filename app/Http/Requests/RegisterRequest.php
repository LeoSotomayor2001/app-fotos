<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:3',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido y debe contener al menos 3 letras',
            'username.required' => 'El nombre de usuario es requerido',
            'username.unique' => 'Este nombre de usuario ya existe',
            'email.unique' => 'El email ya está registrado',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
            'password' => 'El password es requerido',
            'password.confirmed' => 'Los passwords no coinciden'
        ];
    }
}
