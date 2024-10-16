<?php

namespace App\Http\Requests\Single;

use App\Http\Requests\BaseRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class UpdateSettingRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        $rules = [
            'email'            => 'required|email:rfc,dns',
            'phone'            => 'required|string',
            'phone2'           => 'nullable|string',
            'facebook'         => 'nullable|string',
            'instagram'        => 'nullable|string',
            'website'          => 'required|string',
            'map'              => 'required|string',
            'product_per_page' => 'required|integer|between:1,100',
        ];

        $rules += RuleFactory::make([
            '%address%' => 'required|string',
        ]);

        return $rules;
    }
}
