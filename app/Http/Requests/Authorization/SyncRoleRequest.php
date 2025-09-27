<?php

namespace App\Http\Requests\Authorization;

use Illuminate\Foundation\Http\FormRequest;

class SyncRoleRequest extends FormRequest
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
            'roles' => 'required|array',
            'roles.*.name' => 'required|string|exists:roles,name',
        ];
    }

    public function messages(): array
    {
        return [
            'roles.required' => 'Los roles son obligatorios',
            'roles.array' => 'El campo roles debe ser un array',
            'roles.*.name.required' => 'El nombre del rol es obligatorio',
            'roles.*.name.string' => 'El formato del nombre del rol es inválido',
            'roles.*.name.exists' => 'El rol especificado no existe',
        ];
    }
}
