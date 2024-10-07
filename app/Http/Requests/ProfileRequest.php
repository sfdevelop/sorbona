<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'old_password' => ['nullable', 'sometimes', 'min:6', new CurrentPasswordCheckRule],
            'password' => ['nullable', 'sometimes', 'confirmed', 'different:old_password', Password::min(6)->mixedCase()->uncompromised()],
            'password_confirmation' => ['nullable', 'sometimes', 'min:6'],
        ];
    }
}
