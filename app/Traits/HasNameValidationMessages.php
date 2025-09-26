<?php

namespace App\Traits;

trait HasNameValidationMessages
{
    public function nameMessages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre no es válido.',
            'name.max' => 'El nombre es demasiado largo.',
            'name.unique' => 'El nombre ya está registrado.',
        ];
    }
}
