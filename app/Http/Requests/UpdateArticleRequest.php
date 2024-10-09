<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends BaseRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'sort' => 'required|string',
            'file' => 'nullable|image',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.title'] = 'required';
            $rules[$locale . '.description'] = 'required';
        }

        return $rules;
    }
}
