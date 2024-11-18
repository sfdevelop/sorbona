<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends BaseRequest
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
        $categoryId = $this->route('category');

        $rules = [
            'sort' => 'required|string',
            //            'slug' => 'required|string|max:255|unique:categories,slug|regex:/^[a-zA-Z0-9-]+$/'.Rule::unique('categories')->ignore($this->request->get('id')),
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9-]+$/',
                Rule::unique('categories')->ignore($categoryId),
            ],
            'file' => 'nullable|image',
            'category_id' => 'nullable|sometimes:exists:categories,id',
            'in_main' => 'boolean',
            'is_public' => 'boolean',
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
            'in_main' => $this->boolean('in_main'),
            'is_public' => $this->boolean('is_public'),
        ]);
    }

    public function messages(): array
    {
        return [
            'slug.regex' => 'Повинні бути тільки латинські літери, цифри та знаки "-"',
        ];
    }
}
