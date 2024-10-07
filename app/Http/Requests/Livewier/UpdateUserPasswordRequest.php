<?php

namespace App\Http\Requests\Livewier;

use App\Models\User;
use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserPasswordRequest extends FormRequest
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
            'old_password' => ['required', 'sometimes', 'min:8', new CurrentPasswordCheckRule],
            'password' => ['required', 'sometimes', 'different:old_password', Password::min(8)->uncompromised()->letters()->numbers()],
            'password_confirmation' => ['required', 'sometimes', 'min:8', 'same:password'],

        ];
    }
}
