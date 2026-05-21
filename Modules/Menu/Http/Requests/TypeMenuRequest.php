<?php

namespace Modules\Menu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'label' => ['required', 'string', 'max:255'],
            ];
        }

        return [
            'label' => ['sometimes', 'required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'label.required' => 'Le label du type de menu est obligatoire.',
            'label.max'      => 'Le label ne peut pas dépasser 255 caractères.',
        ];
    }
}