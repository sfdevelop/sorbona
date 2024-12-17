<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;

class StoreFilterRequest extends BaseRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'sort' => 'nullable|string',
            'numeric' => 'boolean',
        ];

        $rules += RuleFactory::make([
            '%title%' => 'nullable|string',
        ]);

        return $rules;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'numeric' => $this->boolean('numeric'),
        ]);
    }
}
