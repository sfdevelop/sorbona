<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * @return array
     */
    public function messages(): array
    {
        return RuleFactory::make([
            '%title%.required' => __('admin.title.required'),
            '%description%.required' => __('admin.description.required'),
            '%name%.required' => __('admin.name.required'),
            '%rating%.required' => __('admin.rating.required'),
            '%text%.required' => __('admin.text.required'),
            '%address%.required' => __('admin.address.required'),
            '%textForMail%.required' => __('admin.address.required'),
        ]);
    }

    public function attributes(): array
    {
        return RuleFactory::make([
            '%title%' => __('validation.attributes.title'),
            '%description%' => __('validation.attributes.description'),
            '%descriptionShort%' => __('validation.attributes.descriptionShort'),

            '%notoriety%' => __('validation.attributes.notoriety'),
            '%assortment%' => __('validation.attributes.assortment'),
            '%cooperate%' => __('validation.attributes.cooperate'),
            '%comfort%' => __('validation.attributes.comfort'),
        ]);
    }
}
