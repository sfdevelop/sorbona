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

    public function getBestsellers(): array|Collection
    {
        return Product::query()
            ->trans()
            ->with('categories')
            ->where('is_bestseller', true)
            ->oldest('sort')
            ->get();
    }

    public function getNewProducts(): array|Collection
    {
        return Product::query()
            ->trans()
            ->with('categories')
            ->where('is_new', true)
            ->oldest('sort')
            ->get();
    }

    public function getSaleProducts(): array|Collection
    {
        return Product::query()
            ->trans()
            ->with('categories')
            ->whereNotNull('newPrice')
            ->oldest('sort')
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


    final static function filterAble(array $request, string $class): mixed
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
}
