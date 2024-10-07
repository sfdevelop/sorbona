<?php

namespace App\Http\Requests\Livewier;

use App\Models\User;
use App\Rules\Decimal;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SizeToProductAdminRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'size' => 'required|integer',
            'sizePrice' => ['required', 'sometimes', new Decimal(8, 2)],
        ];
    }
}
