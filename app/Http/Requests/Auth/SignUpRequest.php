<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'area_id' => 'required|exists:areas,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre no es válido.',
            'name.max' => 'El nombre es demasiado largo.',
            'last_name.required' => 'El apellido es obligatorio.',
            'last_name.string' => 'El apellido no es válido.',
            'last_name.max' => 'El apellido es demasiado largo.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico no es válido.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.max' => 'El correo electrónico es demasiado largo.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña no es válida.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'area_id.required' => 'El área es obligatoria.',
            'area_id.exists' => 'El área seleccionada no es válida.',
            'user_status_id.required' => 'El estado del usuario es obligatorio.',
            'user_status_id.exists' => 'El estado del usuario seleccionado no es válido.',
        ];
    }
}
