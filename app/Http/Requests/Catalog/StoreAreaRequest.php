<?php

namespace App\Http\Requests\Catalog;

use App\Traits\HasNameValidationMessages;
use Illuminate\Foundation\Http\FormRequest;

class StoreAreaRequest extends FormRequest
{
    use HasNameValidationMessages;
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
            'name' => 'required|string|max:255|unique:areas,name',
        ];
    }

    public function messages(): array
    {
        return $this->nameMessages();
    }
}
