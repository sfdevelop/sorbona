<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void {}

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        $this->addColorsIds($product);
        $this->addSizesIds($product);
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }

    private function addColorsIds(Product $product): void
    {
        if ($product->isDirty('colors')) {
            $colors = $product->colors;

            if (is_array($colors)) {
                $colorKeys = array_keys($colors);

                $product->colorsIds = $colorKeys;

                $product::withoutEvents(function () use ($product) {
                    $product->save();
                });
            }
        }
    }

    private function addSizesIds(Product $product): void
    {
        if ($product->isDirty('sizes')) {
            $sizes = $product->sizes;

            if (is_array($sizes)) {
                $colorKeys = array_keys($sizes);

                $product->sizesIds = $colorKeys;

                $product::withoutEvents(function () use ($product) {
                    $product->save();
                });
            }
        }
    }
}
