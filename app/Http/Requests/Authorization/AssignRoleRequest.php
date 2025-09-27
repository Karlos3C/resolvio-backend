<?php

namespace App\Http\Requests\Authorization;

use Illuminate\Foundation\Http\FormRequest;

class AssignRoleRequest extends FormRequest
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
            "role_name" => 'required|string|exists:roles,name',
        ];
    }

    public function messages(): array
    {
        return [
            'role_name.required' => 'El nombre del rol es obligatorio.',
            'role_name.string' => 'El formato del nombre del rol es inválido.',
            'role_name.exists' => 'El rol especificado no existe.',
        ];
    }
}
