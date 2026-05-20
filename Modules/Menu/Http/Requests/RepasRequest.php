<?php

namespace Modules\Menu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Création → POST
        if ($this->isMethod('POST')) {
            return [
                'name'        => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string', 'max:1000'],
            ];
        }

        // Modification → PUT 
        return [
            'name'        => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du repas est obligatoire.',
            'name.max'      => 'Le nom ne peut pas dépasser 255 caractères.',
        ];
    }
}
