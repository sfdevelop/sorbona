<?php

namespace App\Http\Requests\Livewier;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisteredUserCollectionRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => ['required', 'email:rfc,dns', 'min:3', Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'password' => ['required', 'sometimes', Password::min(8)->uncompromised()->letters()->numbers()],
            'password_confirmation' => ['required', 'sometimes', 'min:6', 'same:password'],
        ];
    }
}
