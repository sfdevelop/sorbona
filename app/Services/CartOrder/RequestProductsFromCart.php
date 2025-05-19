<?php

namespace App\Services\CartOrder;

use App\Http\Livewire\Front\Trait\CartTrait;
use App\Models\Product;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;

class RequestProductsFromCart
{
    use CartTrait;

    /**
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function getProductsFromArrayInCart(): array|\LaravelIdea\Helper\App\Models\_IH_Product_C|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
    {
        $productIds = $this->getItemsFromCart()->pluck('id')->toArray();

        return Product::query()
            ->trans()
            ->whereIn('id', $productIds)
            ->get();
    }
}