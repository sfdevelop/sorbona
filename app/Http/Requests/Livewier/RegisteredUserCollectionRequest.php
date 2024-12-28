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
            'surname' => 'required|string|min:3',
            'email' => ['nullable', 'sometimes', 'string'],
            'phone' => ['nullable', 'sometimes', 'string'],
//            'password' => ['required', 'sometimes', Password::min(8)->uncompromised()->letters()->numbers()],
            'password' => ['required', 'sometimes'],
            'password_confirmation' => ['required', 'sometimes', 'min:6', 'same:password'],
            'mailPhone' => ['required', 'string'],
            ];
    }

    protected function prepareForValidation(): void
    {
        $mailPhone = $this->input('mailPhone');
    
        // Більш надійна перевірка email
        if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $mailPhone)) {
            $this->merge([
                'email' => $mailPhone,
                'phone' => null,
            ]);
        } else {
            // Базова перевірка на телефонний номер (можна адаптувати під ваш формат)
            $phone = preg_replace('/[^0-9]/', '', $mailPhone);
            if (strlen($phone) >= 10) {
                $this->merge([
                    'email' => null,
                    'phone' => $phone,
                ]);
            } else {
                // Якщо не відповідає ні email, ні телефону
                $this->merge([
                    'email' => $mailPhone,
                    'phone' => null,
                ]);
                // Додаємо помилку валідації
                $this->validator->errors()->add('mailPhone', 'Невірний формат email або телефону');
            }
        }
    }
}
