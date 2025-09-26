<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreReplyCommentRequest extends FormRequest
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
            'body' => 'required|string',
            'comment_id' => 'required|exists:comments,id',
        ];
    }

    public function messages(): array
    {
        return [
            'body.required' => 'El comentario es obligatorio.',
            'body.string' => 'El comentario debe ser una cadena de texto.',
            'comment_id.required' => 'El ID del comentario es obligatorio.',
            'comment_id.exists' => 'El comentario especificado no existe.',
        ];
    }
}
