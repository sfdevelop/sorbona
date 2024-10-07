<?php

namespace App\ViewModels;

use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SearchViewModel extends BaseViewModel
{
    public function __construct(
        protected string $query,
        public ProductRepositoryInterface $productRepository
    ) {}

    /**
     * @return array|Collection
     */
    public function products(): Collection|array
    {
        return $this->productRepository->searchProducts($this->query);
    }

    /**
     * @return string
     */
    public function searchString(): string
    {
        return $this->query;
    }

    /**
     * @return array|mixed
     */
    public function wishlistOnAuthUser(): mixed
    {
        if (! \Auth::check()) {
            return [];
        }

        return \Auth::user()->wishlist_ids;
    }
}
