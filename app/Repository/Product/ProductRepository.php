<?php

namespace App\Repository\Product;

use App\Http\Filters\ProductFilter;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function searchProducts(string $request): array|Collection
    {
        return Product::query()
            ->trans()
            ->whereTranslationLike('title', "%{$request}%", app()->getLocale())
            ->get();
    }

    public function getNewProducts(): array|Collection
    {
        return Product::query()
            ->inRandomOrder()
            ->trans()
            ->with(['category','manufacturer'])
            ->where('is_new', true)
            ->oldest('sort')
            ->take(4)
            ->get();
    }

    public function getSaleProducts(): array|Collection
    {
        return Product::query()
            ->inRandomOrder()
            ->trans()
            ->with(['category','manufacturer'])
            ->whereNotNull('sale')
            ->oldest('sort')
            ->take(4)
            ->get();
    }

    public function getProductsFromFilter(
        $request,
        int $category_id,
    ): Collection|array {
        return Product::query()
            ->Filter(self::filterAble($request->all(), ProductFilter::class))
            ->trans()
            ->with(['categories', 'productColors'])
            ->whereHas('categories', function ($query) use ($category_id) {
                $query->where('categories.id', $category_id);
            })
            ->once();

        //        ->sortBy(function ($product) {
        //        return floatval(preg_replace('/[^0-9.]/', '',
        //            $product->now_price));
        //    });
    }

    final public static function filterAble(array $request, string $class): mixed
    {
        return app()->make($class, ['queryParams' => array_filter($request)]);
    }

    public function getUniqColorsFromProduct(int $category_id)
    {
        $result = Product::query()
            ->trans()
            ->with(['categories', 'productColors'])
            ->whereHas('categories', function ($query) use ($category_id) {
                $query->where('categories.id', $category_id);
            })
            ->get();

        return $result
            ->pluck('productColors')
            ->flatten()
            ->unique('id');
    }

    public function getRandomProductsInIdCategories(array $categories_id): Collection
    {
        return Product::query()
            ->inRandomOrder()
            ->trans()
            ->with(['category','manufacturer'])
            ->whereIn('category_id', $categories_id)
            ->oldest('sort')
            ->take(8)
            ->get();
    }

    public function getCategoryProducts(int $category_id): Collection
    {
        return Product::query()
            ->trans()
            ->with(['category', 'manufacturer'])
            ->where('category_id', $category_id)
            ->oldest('sort')
            ->get();
    }

    public function getCategoryRandomProductsWithoutSelf(
        int $category_id,
        int $thisProductId
    ): Collection {
        return Product::query()
            ->inRandomOrder()
            ->trans()
            ->with(['category', 'manufacturer'])
            ->where('category_id', $category_id)
            ->whereNot('id', $thisProductId)
            ->oldest('sort')
            ->take(8)
            ->get();
    }

    public function getProductsInIds(array $productIds): Collection
    {
        return Product::query()
            ->inRandomOrder()
            ->trans()
            ->with(['category','manufacturer'])
            ->whereIn('id', $productIds)
            ->oldest('sort')
            ->get();
    }
}
