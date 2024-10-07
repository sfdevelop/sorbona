<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateProductRequest extends BaseRequest
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
            'category' => 'required|array',
            'price' => 'required',
            'sku' => 'required',
            'newPrice' => 'nullable',
            'file' => 'nullable|image',
            'is_new' => 'boolean',
            'is_bestseller' => 'boolean',
        ];

        $rules += RuleFactory::make([
            '%title%' => 'required|string',
            '%description%' => 'required|string',
        ]);

        return $rules;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_bestseller' => $this->boolean('is_bestseller'),
            'is_new' => $this->boolean('is_new'),
        ]);
    }
}
