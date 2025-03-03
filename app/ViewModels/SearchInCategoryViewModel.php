<?php

namespace App\ViewModels;

use App\Models\Product;
use App\Models\Category;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Setting\SettingRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SearchInCategoryViewModel extends BaseViewModel
{
    public function __construct(
        protected string $query,
        protected Category $category,
        protected Request $request,
        public ProductRepositoryInterface $productRepository
    ) {}

    /**
     * @return array|Collection
     */
    public function products()
    {
        $products = $this->productRepository->searchProducts($this->query, $this->category);

        return $this->sortProducts($products)->paginate($this->getSettingPerPage() ?? 12);
    }

    public function searchCategories()
    {
        $searchText = trim($this->query);

        $categoriesWithCounts = Product::query()
            ->trans()
            ->whereTranslationLike('title', "%{$searchText}%", app()->getLocale())
            ->orWhere('sku', "{$searchText}")
            ->select('category_id')
            ->with('category') // Assuming a relationship 'category' exists in the Product model
            ->groupBy('category_id')
            ->selectRaw('category_id, COUNT(*) as product_count')
            ->get();

        // Build result with links
        return $categoriesWithCounts->map(function ($data) use ($searchText) {
            return [
                'name' => $data->category->title,
                'count' => $data->product_count,
                'url' => url("search/{$data->category->slug}?search=".urlencode($searchText)),
            ];
        });
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
