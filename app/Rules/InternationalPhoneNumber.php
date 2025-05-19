<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InternationalPhoneNumber implements Rule
{
    public function passes($attribute, $value): bool|int
    {
        // Видалення всіх символів, крім цифр та '+'
        $cleanedValue = preg_replace('/[^0-9+]/', '', $value);

        // Перевірка на відповідність міжнародному формату
        return preg_match('/^\+[1-9]\d{1,14}$/', $cleanedValue);
    }

    public function message(): string
    {
        return __('front.phone_error');
    }
}
