<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoles_PermRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'labelle'     => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:255',
            'perms'       => 'nullable|array',
            'perms.*'     => 'integer|exists:perms,id',
        ];
    }

    public function messages(): array
    {
        return [
            'labelle.string'   => 'Le titre doit être une chaîne de caractères.',
            'perms.array'      => 'Les permissions doivent être un tableau.',
            'perms.*.integer'  => 'Chaque permission doit être un entier.',
            'perms.*.exists'   => 'Une permission sélectionnée n\'existe pas.',
        ];
    }
}