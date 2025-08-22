<?php

namespace App\Http\Requests;

use App\Enums\Language;
use Illuminate\Foundation\Http\FormRequest;

class SharedRoleRequest extends FormRequest
{
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
        $rules = [
            'code' => "required|string|max:100",
            'name' => 'required|array'
        ];

        $languages = Language::cases();

        foreach ($languages as $language) {
            $rules['name.' . $language->name] = "required|string|max:100";
            $rules['name.' . $language->name] = "required|string|max:100";
        }

        return $rules;
    }
}
