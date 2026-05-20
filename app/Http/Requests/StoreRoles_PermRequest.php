<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoles_PermRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'labelle'     => 'required|string|max:255',
            'description' => 'required|string|max:255',
            // IDs des permissions à attacher (optionnel à la création)
            'perms'       => 'nullable|array',
            'perms.*'     => 'required|string|exists:perms,id'
        ];
    }

    public function messages(): array
    {
        return [
            'labelle.required'     => 'Le titre du groupe est obligatoire.',
            'labelle.string'       => 'Le titre doit être une chaîne de caractères.',
            'description.required' => 'La description est obligatoire.',
            'perms.array'          => 'Les permissions doivent être un tableau.',
            'perms.*.integer'      => 'Chaque permission doit être un entier.',
            'perms.*.exists'       => 'La permission ":input" n\'existe pas.',
        ];
    }
}