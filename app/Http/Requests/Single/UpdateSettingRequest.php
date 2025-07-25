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
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|string',
            'phone2' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'website' => 'required|string',
            'map' => 'nullable|string',
            'textForMail' => 'nullable|sometimes|string',
            'cooperate' => 'required|sometimes|string',
            'product_per_page' => 'required|integer|between:1,100',
        ];

        $rules += RuleFactory::make([
            '%address%' => 'required|string',
            '%cooperate%' => 'required|string',
            '%textForMail%' => 'required|string',
            '%default_address%' => 'nullable|sometimes|string',
            '%default_time_work%' => 'nullable|sometimes|string',
        ]);

        return $rules;
    }
}
