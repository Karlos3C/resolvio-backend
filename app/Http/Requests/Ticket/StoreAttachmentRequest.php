<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttachmentRequest extends FormRequest
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
            'ticket_id' => 'required|integer|exists:tickets,id',
            'attachment' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240', // Max size 10MB
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre no es válido.',
            'name.max' => 'El nombre es demasiado largo.',
            'ticket_id.required' => 'El ID del ticket es obligatorio.',
            'ticket_id.integer' => 'El formato del ID del ticket es inválido.',
            'ticket_id.exists' => 'El ticket especificado no existe.',
            'attachment.required' => 'El archivo es obligatorio.',
            'attachment.file' => 'El archivo no es válido.',
            'attachment.mimes' => 'El archivo debe ser de tipo: jpg, jpeg, png, pdf.',
            'attachment.max' => 'El archivo no debe ser mayor a 10MB.',
        ];
    }
}
