<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'issue_id' => 'sometimes|required|exists:issues,id',
            'priority_id' => 'sometimes|required|exists:priorities,id',
            'responsable_id' => 'nullable|exists:users,id',
            'ticket_status_id' => 'sometimes|required|exists:ticket_statuses,id',
            'limit_date' => 'nullable|date',
            'tags' => 'nullable|array',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.string' => 'El formato del título es inválido.',
            'title.max' => 'El título es demasiado largo.',
            'description.string' => 'El formato de la descripción es inválido.',
            'issue_id.required' => 'Seleccionar el problema es obligatorio.',
            'issue_id.exists' => 'El problema seleccionado no es válido.',
            'priority_id.required' => 'Seleccionar la prioridad es obligatorio.',
            'priority_id.exists' => 'La prioridad seleccionada no es válida.',
            'responsable_id.exists' => 'El responsable seleccionado no es válido.',
            'ticket_status_id.required' => 'El estado del ticket es obligatorio.',
            'ticket_status_id.exists' => 'El estado del ticket seleccionado no es válido.',
            'limit_date.date' => 'La fecha límite debe ser una fecha válida.',
            'tags.array' => 'Las etiquetas deben ser un arreglo.',
        ];
    }
}
