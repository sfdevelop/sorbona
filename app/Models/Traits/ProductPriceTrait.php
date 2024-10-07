<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Number;

trait ProductPriceTrait
{
    /**
     * Присваиваем old_price цену в колонке price
     *
     * @return Attribute
     */
    public function oldPrice(): Attribute
    {
        return new Attribute(
            get: fn () => ! is_null($this->newPrice)
                ? Number::currency($this->attributes['price'], 'EUR', 'lt')
                : null
        );
    }

    /**
     * Узнаем цену, ели есть новая значит присваиваем новую цену, если нет оставляем текущую
     *
     * @return Attribute
     */
    public function nowPrice(): Attribute
    {
        return new Attribute(
            get: fn () => $this->calculateNowPrice()
        );
    }

    private function calculateNowPrice(): bool|string|null
    {
        if (is_null($this->newPrice)) {
            return Number::currency($this->price, 'EUR', 'lt');
        }

        return Number::currency($this->newPrice, 'EUR', 'lt');
    }
}
