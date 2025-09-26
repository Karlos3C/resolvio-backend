<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'body' => 'required',
            'evidence' => 'sometimes|required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'ticket_id' => 'required|exists:tickets,id',
        ];
    }

    public function messages(): array
    {
        return [
            'body.required' => 'El cuerpo del comentario es obligatorio.',
            'ticket_id.required' => 'El ID del ticket es obligatorio.',
            'ticket_id.exists' => 'El ticket especificado no existe.',
        ];
    }
}
