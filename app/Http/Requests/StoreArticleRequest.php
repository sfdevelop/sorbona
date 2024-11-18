<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreArticleRequest extends BaseRequest
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

        $rules += RuleFactory::make([
            '%title%' => 'required|string',
            '%description%' => 'required|string',
        ]);

        return $rules;
    }
}
