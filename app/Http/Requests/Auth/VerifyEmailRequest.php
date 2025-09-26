<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class VerifyEmailRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string|max:6|min:6|exists:users,token',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico no es válido',
            'email.exists' => 'El usuario no existe',
            'token.required' => 'El token es obligatorio',
            'token.string' => 'El token no es válido',
            'token.max' => 'El token no es válido',
            'token.min' => 'El token no es válido',
            'token.exists' => 'El token no es válido',
        ];
    }
}
