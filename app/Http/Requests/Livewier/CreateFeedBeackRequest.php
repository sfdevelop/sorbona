<?php

namespace App\Http\Requests\Livewier;

use Illuminate\Foundation\Http\FormRequest;

class CreateFeedBeackRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns',
            'name' => 'required|string|min:3|max:200',
            'text' => 'required|string|min:3|',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
