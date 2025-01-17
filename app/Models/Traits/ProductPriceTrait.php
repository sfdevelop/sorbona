<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ProductPriceTrait
{
    private function getPriceByGroup()
    {
        $user = auth()->user();
        if ($user) {
            return match ($user->roles->first()->name) {
                'smallopt' => $this->getPriceFromTen(),
                'bigopt' => $this->getPriceFromTwenty(),
                default => $this->calculateNowPrice()
            };
        }
        return $this->calculateNowPrice();
    }

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
            //            get: fn () => $this->calculateNowPrice(),
            get: fn () => $this->getPriceByGroup(),
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
