<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypes_userRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "labelle" => ["required","string","max:255"],
            "description" => ["nullable","string","max:255"]
        ];
    }

    public function message(): array
    {
        return [
            "labelle:required" => "un nom est requis pour créer un type"
        ];
    }
}
