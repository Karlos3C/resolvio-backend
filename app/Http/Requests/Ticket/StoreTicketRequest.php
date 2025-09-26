<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'issue_id' => 'required|exists:issues,id',
            'priority_id' => 'required|exists:priorities,id',
            'responsable_id' => 'nullable|exists:users,id',
            'limit_date' => 'nullable|date',
            'tags' => 'nullable|json',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.string' => 'El formato del título es inválido.',
            'title.max' => 'El título es demasiado largo.',
            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'El formato de la descripción es inválido.',
            'issue_id.required' => 'Seleccionar el problema es obligatorio.',
            'issue_id.exists' => 'El problema seleccionado no es válido.',
            'priority_id.required' => 'Seleccionar la prioridad es obligatorio.',
            'priority_id.exists' => 'La prioridad seleccionada no es válida.',
            'tags.json' => 'Las etiquetas deben ser un JSON válido.',
            'responsable_id.exists' => 'El usuario responsable seleccionado no es válido.',
            'limit_date.date' => 'El formato de la fecha límite es inválido.',
        ];
    }
}
