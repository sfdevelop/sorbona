<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBenefitRequest extends BaseRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $rules = [
            'sort' => 'required|string',
            'file' => 'nullable|image',
        ];

        $rules += RuleFactory::make([
            '%title%' => 'required|string',
        ]);

        return $rules;
    }
}
