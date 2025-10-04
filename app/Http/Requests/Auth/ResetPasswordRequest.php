<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
           'token' => 'required|string|max:6|min:6|exists:users,token',
           'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'token.required' => 'El token es obligatorio',
            'token.string' => 'El token no es válido',
            'token.max' => 'El token no es válido',
            'token.min' => 'El token no es válido',
            'token.exists' => 'El token no es válido',
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña no es válida.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ];
    }
}
