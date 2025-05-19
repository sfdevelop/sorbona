<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait PriceFromProductReplaceDotTrait
{
    // Додайте ці методи в клас Product

    /**
     * Обробка поля price - замінює кому на крапку
     */
    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $this->normalizeDecimalValue($value)
        );
    }

    /**
     * Обробка поля sale - замінює кому на крапку
     */
    protected function sale(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $this->normalizeDecimalValue($value)
        );
    }

    /**
     * Обробка поля priceTen - замінює кому на крапку
     */
    protected function priceTen(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $this->normalizeDecimalValue($value)
        );
    }

    /**
     * Обробка поля priceTwenty - замінює кому на крапку
     */
    protected function priceTwenty(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $this->normalizeDecimalValue($value)
        );
    }

    /**
     * Допоміжний метод для нормалізації десяткових значень
     */
    private function normalizeDecimalValue($value)
    {
        if (is_string($value)) {
            // Замінюємо кому на крапку
            return str_replace(',', '.', $value);
        }

        return $value;
    }
}
