<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateManufacturerRequest extends BaseRequest
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
            'year' => 'nullable|sometimes|string',
            'file' => 'nullable|sometimes|image',

        ];

        $rules += RuleFactory::make([
            '%title%' => 'required|string',
            '%description%' => 'required|string',
            '%all_title%' => 'nullable|string',
            '%specialization%' => 'nullable|string',
            '%flat%' => 'nullable|string',
        ]);

        return $rules;
    }
}
