<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;

class StoreProductRequest extends BaseRequest
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
            'sort' => 'required|string',
            'price' => 'required',
            'sku' => 'required',
            'category' => 'required|array',
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
