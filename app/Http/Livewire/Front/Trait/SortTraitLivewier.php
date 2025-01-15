<?php

namespace App\Http\Livewire\Front\Trait;

use Illuminate\Database\Eloquent\Collection;

trait SortTraitLivewier
{
    public function sortCollection(array|Collection $productsQuery)
    {

        return match ($this->order) {
            'lowest_price' => $productsQuery->sortBy(function ($product) {

                return transformNovPriceFromSort($product);
            }),
            'highest_price' => $productsQuery->sortByDesc(function ($product) {
                return transformNovPriceFromSort($product);
            }),
            'bestsellers' => $productsQuery->sort(function ($productA, $productB) {
                if ($productA->is_bestseller && ! $productB->is_bestseller) {
                    return -1; // Поменяйте на 1, если хотите сохранить текущую логику
                } elseif (! $productA->is_bestseller && $productB->is_bestseller) {
                    return 1; // Поменяйте на -1, если хотите сохранить текущую логику
                }

                return $productA->sort <=> $productB->sort;
            }),
            default => $productsQuery->sortBy('sort'),
        };
    }
}
