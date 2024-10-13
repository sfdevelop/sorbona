<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Number;

trait ProductPriceTrait
{

    public function oldPrice(): Attribute
    {
        return new Attribute(
            get: fn()
                => ! is_null($this->newPrice)
                ? Number::currency($this->attributes['price'], 'EUR', 'lt')
                : null,
        );
    }


    public function nowPrice(): Attribute
    {
        return new Attribute(
            get: fn() => $this->calculateNowPrice(),
        );
    }

    public function priceFromTen(): Attribute
    {
        return new Attribute(
            get: fn() => $this->getPriceFromTen(),
        );
    }

    public function priceFromTwenty(): Attribute
    {
        return new Attribute(
            get: fn() => $this->getPriceFromTwenty(),
        );
    }

    private function calculateNowPrice(): bool|string|null
    {
        $currencyValue = $this->currency['currency'];

        $price = $this->price * $currencyValue;

        if (is_null($this->sale)) {
            return Number::format($price, precision: 2, locale: 'uk');
        }

        $percentSalePrice = $price * (1 - $this->sale / 100);

        return Number::format($percentSalePrice, precision: 2, locale: 'uk');
    }

    private function getPriceFromTen(): bool|string|null
    {
        $currencyValue = $this->currency['currency'];

        return Number::format($this->priceTen * $currencyValue, precision: 2, locale: 'uk');
    }

    private function getPriceFromTwenty(): bool|string|null
    {
        $currencyValue = $this->currency['currency'];

        return Number::format($this->priceTwenty * $currencyValue, precision: 2, locale: 'uk');
    }
}
