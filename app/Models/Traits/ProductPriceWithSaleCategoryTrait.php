<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Number;

trait ProductPriceWithSaleCategoryTrait
{
    /**
     * Присваиваем old_price цену в колонке price
     *
     * @return Attribute
     */
    public function oldPrice(): Attribute
    {
        return new Attribute(
            get: fn () => ! is_null($this->newPrice) || ! $this->categories->whereNotNull('salePercent')->isEmpty() || ! $this->categories->whereNotNull('parentCategory.salePercent')->isEmpty()
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
            return $this->calculateDiscountedPrice();
        }

        return Number::currency($this->newPrice, 'EUR', 'lt');
    }

    private function calculateDiscountedPrice(): bool|string|null
    {
        if ($this->categories->whereNotNull('salePercent')->isEmpty() && $this->categories->whereNotNull('parentCategory.salePercent')->isEmpty()) {
            return Number::currency($this->price, 'EUR', 'lt');
        }

        $minSalePercent = $this->categories->pluck('salePercent')
            ->merge($this->categories->pluck('parentCategory.salePercent'))
            ->filter()
            ->min();

        //        info($minSalePercent);

        $discountedPrice = $this->price * (1 - $minSalePercent / 100);

        return Number::currency($discountedPrice, 'EUR', 'lt');
    }
}
