<?php

namespace Modules\Menu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'name'             => ['required', 'string', 'max:255'],
                'description'      => ['nullable', 'string', 'max:1000'],
                'type_menu_id'     => ['required', 'integer', 'exists:type_menus,id'],
                'account_id'       => ['required', 'integer', 'exists:accounts,id'],
                'price'            => ['required', 'numeric', 'min:0'],
                'photo'            => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
                'status'           => ['required', 'string', 'in:actif,inactif'],
                'preparation_time' => ['required', 'integer', 'min:1'],
            ];
        }

        return [
            'name'             => ['sometimes', 'required', 'string', 'max:255'],
            'description'      => ['nullable', 'string', 'max:1000'],
            'type_menu_id'     => ['sometimes', 'required', 'integer', 'exists:type_menus,id'],
            'account_id'       => ['sometimes', 'required', 'integer', 'exists:accounts,id'],
            'price'            => ['sometimes', 'required', 'numeric', 'min:0'],
            'photo'            => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'status'           => ['sometimes', 'required', 'string', 'in:actif,inactif'],
            'preparation_time' => ['sometimes', 'required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'             => 'Le nom du menu est obligatoire.',
            'type_menu_id.required'     => 'Le type de menu est obligatoire.',
            'type_menu_id.exists'       => 'Le type de menu sélectionné n\'existe pas.',
            'account_id.required'       => 'Le compte est obligatoire.',
            'account_id.exists'         => 'Le compte sélectionné n\'existe pas.',
            'price.required'            => 'Le prix est obligatoire.',
            'price.numeric'             => 'Le prix doit être un nombre.',
            'price.min'                 => 'Le prix doit être supérieur à 0.',
            'photo.image'               => 'Le fichier doit être une image.',
            'photo.mimes'               => 'L\'image doit être en jpeg, png, jpg ou webp.',
            'photo.max'                 => 'L\'image ne doit pas dépasser 2MB.',
            'status.in'                 => 'Le statut doit être actif ou inactif.',
            'preparation_time.required' => 'Le temps de préparation est obligatoire.',
            'preparation_time.integer'  => 'Le temps de préparation doit être un nombre entier.',
            'preparation_time.min'      => 'Le temps de préparation doit être supérieur à 0.',
        ];
    }
}