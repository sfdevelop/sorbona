<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ProductPriceTrait
{
    public function oldPrice(): Attribute
    {
        return new Attribute(
            get: fn () => ! is_null($this->newPrice)
                ? $this->attributes['price']
                : null,
        );
    }

    public function nowPrice(): Attribute
    {
        return new Attribute(
            get: fn () => $this->calculateNowPrice(),
        );
    }

    public function priceFromTen(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getPriceFromTen(),
        );
    }

    public function priceFromTwenty(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getPriceFromTwenty(),
        );
    }

    private function calculateNowPrice(): bool|string|null
    {
        $currencyValue = $this->currency['currency'];

        $price = $this->price * $currencyValue;

        if (is_null($this->sale)) {
            return $price;
        }

        return $price * (1 - $this->sale / 100);
    }

    private function getPriceFromTen(): bool|string|null
    {
        $currencyValue = $this->currency['currency'];

        return $this->priceTen * $currencyValue;
    }

    private function getPriceFromTwenty(): bool|string|null
    {
        $currencyValue = $this->currency['currency'];

        return $this->priceTwenty * $currencyValue;
    }
}
