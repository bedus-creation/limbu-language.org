<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranslationUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "english"       => "required|string|max:500",
            "limbu"         => "required|string|max:500",
            "pronunciation" => "nullable|string|max:500",
        ];
    }
}
