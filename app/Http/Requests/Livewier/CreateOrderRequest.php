<?php

namespace App\Http\Requests\Livewier;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'surname' => 'required|string|min:3',
            'phone' => 'required|string',
            'email' => 'required|string|min:3|email:rfc,dns',
            'delivery' => 'required|string',
            'payment' => 'required|string',
            'comment' => 'nullable|string',
            'total' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
