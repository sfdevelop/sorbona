<?php

namespace App\ViewModels;

use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Setting\SettingRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SearchViewModel extends BaseViewModel
{
    public function __construct(
        protected string $query,
        protected Request $request,
        public ProductRepositoryInterface $productRepository
    ) {}

    /**
     * @return array|Collection
     */
    public function products()
    {
        $products = $this->productRepository->searchProducts($this->query);

        return $this->sortProducts($products)->paginate($this->getSettingPerPage() ?? 12);
    }

    public function searchCategories()
    {
        return $this->productRepository->searchCategories($this->query);
    }

    protected function sortProducts(array|Collection $products)
    {
        return match ($this->request->sort) {
            'asc' => $products->sortBy('now_price'),
            'desc' => $products->sortByDesc('now_price'),
            'default' => $products->sortByDesc('sort'),
            default => $products->reverse(),
        };
    }

    protected function getSettingPerPage(): int
    {
        return app()
            ->make(SettingRepositoryInterface::class)
            ->getPerPAge();
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
