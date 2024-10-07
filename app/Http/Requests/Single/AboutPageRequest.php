<?php

namespace App\Http\Requests\Single;

use App\Http\Requests\BaseRequest;

class AboutPageRequest extends BaseRequest
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
            'file' => 'nullable|image',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale.'.description'] = 'required';
            $rules[$locale.'.titleSectionAboutUs'] = 'required';
            $rules[$locale.'.titleDownAboutUs'] = 'required';
            $rules[$locale.'.descriptionRememberAboutUs'] = 'required';
            $rules[$locale.'.textFeedBackAboutUs'] = 'required';
        }

        return $rules;
    }
}
