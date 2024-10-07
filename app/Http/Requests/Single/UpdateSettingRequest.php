<?php

namespace App\Http\Requests\Single;

use App\Http\Requests\BaseRequest;

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
            'phone3' => 'nullable|string',
            'phone4' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'required|string',
            //            'map' => 'required|string',
        ];

        foreach (config('translatable.locales') as $locale) {
            //            $rules[$locale . '.address'] = 'required';
            $rules[$locale.'.work'] = 'required';
            $rules[$locale.'.weekend'] = 'required';
            $rules[$locale.'.text'] = 'required';
            $rules[$locale.'.address'] = 'required';
            $rules[$locale.'.textForMail'] = 'nullable';
        }

        return $rules;
    }
}
