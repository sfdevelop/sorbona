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

    public function getPriceWithDiscount(int $quantity): ?string
    {
        $currencyValue = $this->currency['currency'];
        $price = $this->price * $currencyValue;

        $user = auth()->user();
        if ($user && ! in_array($user->roles->first()->name, ['smallopt', 'bigopt'])) {
            return 0;
        }

        if (is_null($this->sale) || $quantity != 1) {
            return 0;
        }

        return $price;
    }

    private function calculateNowPriceWithoutDiscount(): bool|string|null
    {
        $currencyValue = $this->currency['currency'];

        return $this->price * $currencyValue;
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

    public function getPriceByCount($count)
    {
        $smallOpt = $this->qtyMilkoopt;
        $bigOpt = $this->qtyOpt;

        return match (true) {
            ($count >= $smallOpt) && ($count < $bigOpt) => $this->getPriceFromTen(),
            ($count >= $bigOpt) => $this->getPriceFromTwenty(),
            ($count != 1) => $this->calculateNowPriceWithoutDiscount(),
            default => $this->calculateNowPrice(),
        };
    }
}
