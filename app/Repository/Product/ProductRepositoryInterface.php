<?php

namespace App\Repository\Product;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function searchProducts(string $searchText, $category): array|Collection;

    public function searchCategories(string $searchText);

    public function getNewProducts(): array|Collection;

    public function getSaleProducts(): array|Collection;

    public function getProductsFromFilter(
        Request $request,
        int $category_id,
    ): array|Collection;

    public function getUniqColorsFromProduct(int $category_id);

    public function getRandomProductsInIdCategories(array $categories_id,
    ): Collection;

    public function getCategoryProducts(int $category_id): Collection;

    public function getCategoryRandomProductsWithoutSelf(
        int $category_id,
        int $thisProductId,
    ): Collection;

    public function getProductsInIds(array $productIds): Collection;
}
