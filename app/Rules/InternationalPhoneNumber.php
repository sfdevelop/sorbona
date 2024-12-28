<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

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
        return __("front.phone_error");
    }
}
