<?php

namespace App\Http\Requests\Single;

use App\Http\Requests\BaseRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class OptionMainPageRequest extends BaseRequest
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

        ];

        $rules += RuleFactory::make([
            '%title%' => 'required|string',
            '%description%' => 'required|string',

            '%descriptionShort%' => 'required|string',
            '%notoriety%' => 'required|string',
            '%assortment%' => 'required|string',
            '%cooperate%' => 'required|string',
            '%comfort%' => 'required|string',
        ]);

        return $rules;
    }
}
