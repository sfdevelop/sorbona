<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;

class UpdateColorRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        $rules = [];

        $rules += RuleFactory::make([
            '%title%' => 'required|string',
        ]);

        return $rules;
    }
}
