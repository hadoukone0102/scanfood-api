<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'max:255', 'unique:accounts,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'     => ['nullable', 'in:restaurateur,client'],
            'phone'    => ['required', 'string', 'max:20'],
            'avatar'   => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];
    }

    // Les messages sont dans leur propre méthode
    public function messages(): array
    {
        return [
            'name.required'     => 'Le nom est requis.',
            'email.required'    => "L'email est requis.",
            'email.email'       => "L'email doit être une adresse email valide.",
            'email.unique'      => 'Cet email est déjà utilisé.',
            'password.required' => 'Le mot de passe est requis.',
            'password.min'      => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed'=> 'La confirmation du mot de passe ne correspond pas.',
            'phone.required'    => 'Le numéro de téléphone est requis.',
        ];
    }
}