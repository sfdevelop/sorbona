<?php

namespace App\Repository\Product;

use App\Http\Filters\ProductFilter;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function searchCategories(string $searchText)
    {
        $searchText = trim($searchText);

        $categoriesWithCounts = Product::query()
            ->trans()
            ->where(function ($query) use ($searchText) {
                $query->whereTranslationLike('title', "%{$searchText}%", app()->getLocale())
                    ->orWhere('sku', $searchText)
                    ->orWhereTranslationLike('description', "%{$searchText}%", app()->getLocale())
                    ->orWhereHas('manufacturer', function ($query) use ($searchText) {
                        $query->whereTranslationLike('title', 'LIKE', "%{$searchText}%");
                    });
            })
            ->select('category_id')
            ->with('category') // Assuming a relationship 'category' exists in the Product model
            ->groupBy('category_id')
            ->selectRaw('category_id, COUNT(*) as product_count')
            ->get();

        //        dd($categoriesWithCounts);
        // Build result with links
        return $categoriesWithCounts->map(function ($data) use ($searchText) {
            return [
                'name' => $data->category->title,
                'count' => $data->product_count,
                'url' => url("search/{$data->category->slug}")."?search=$searchText",
            ];
        });
    }

    public function searchProducts(string $searchText, $category = null): array|Collection
    {
        /*
                $results = Product::query()
                    ->trans()
                    ->with(['category', 'manufacturer'])
                    ->where(function ($query) use ($searchText) {
                        $query->whereTranslationLike('title', "%{$searchText}%", app()->getLocale())
                            ->orWhere('sku', 'LIKE', "%{$searchText}%")
                            ->orWhereTranslationLike('description', "%{$searchText}%", app()->getLocale())
                            ->orWhereHas('manufacturer', function ($query) use ($searchText) {
                                $query->whereTranslationLike('title', 'LIKE', "%{$searchText}%");
                            });
                    });

                if ($category) {
                    $results->whereHas('category', function ($query) use ($category) {
                        $query->where('categories.id', $category->id);
                    });
                }

                return $results->get();
        */
        $locale = app()->getLocale();
        $products = Product::search($searchText)
            ->with(['translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }]);

        if ($category) {
            $products->whereHas('category', function ($query) use ($category) {
                $query->where('categories.id', $category->id);
            });
        }

        return $products->get();
    }

    public function getNewProducts(): array|Collection
    {
        return Product::query()
            ->inRandomOrder()
            ->trans()
            ->with(['category', 'manufacturer'])
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
            ->with(['category', 'manufacturer'])
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
            ->with(['category', 'manufacturer'])
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
            ->with(['category', 'manufacturer'])
            ->whereIn('id', $productIds)
            ->oldest('sort')
            ->get();
    }
}
