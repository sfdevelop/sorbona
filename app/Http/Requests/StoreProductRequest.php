<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;

class StoreProductRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'price' => 'required',
            'priceTen' => 'required',
            'priceTwenty' => 'required',
            'sku' => 'required',
            'category_id' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'currency_id' => 'required|integer',
            'newPrice' => 'nullable',
            'file' => 'nullable|image',
            'sale' => 'nullable|sometimes|integer|between:1,100',
            'is_new' => 'boolean',
            'is_public' => 'boolean',
            'is_top' => 'boolean',
            'in_stock' => 'boolean',
            'qtyMilkoopt' => 'required|integer',
            'qtyOpt' => 'required|integer',
        ];

        $rules += RuleFactory::make([
            '%title%' => 'nullable|sometimes|string',
            '%description%' => 'nullable|sometimes|string',
        ]);

        return $rules;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_public' => $this->boolean('is_public'),
            'is_new' => $this->boolean('is_new'),
            'is_top' => $this->boolean('is_top'),
            'in_stock' => $this->boolean('in_stock'),
        ]);
    }

    public function attributes(): array
    {
        return [
            'manufacturer_id' => __('admin.manufacturer'),
            'currency_id' => __('admin.currency'),
            'sale' => __('admin.sale_text'),
            'priceTen' => __('admin.priceTen'),
            'priceTwenty' => __('admin.priceTwenty'),

            'is_public' => __('admin.is_public'),
            'is_new' => __('admin.new'),
            'is_top' => __('admin.is_top'),
            'in_stock' => __('admin.in_stock'),
        ];
    }
}
