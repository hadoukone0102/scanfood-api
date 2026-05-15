<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePermissionsRequest extends FormRequest
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
            //
            "code"=> ["required","string","max:255"],
            "desc"=> ["nullable","string","max:255"]
        ];
    }

    public function message ():array
    {
        return [
            "code.required" => "Le code est obligatoire"
        ];
    }
}
