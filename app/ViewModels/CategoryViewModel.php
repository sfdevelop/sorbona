<?php

namespace App\ViewModels;

use App\Http\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductUnicJsonTable\ProductUnicJsonServiceInterface;
use Illuminate\Http\Request;

class CategoryViewModel extends BaseViewModel
{
    public function __construct(
        public Category $category,
        protected ProductUnicJsonServiceInterface $unicJsonService,
        protected Request $request,
    ) {}

    protected function allProducts()
    {
        return Product::query()
            ->Filter($this->filterAble($this->request->all(), ProductFilter::class))
            ->trans()
            ->where('category_id', $this->category->id)
            ->oldest('sort')
            ->once();
    }

    /**
     * @return mixed
     */
    public function products(): mixed
    {
        $products = $this->allProducts();

        return $products->paginate(12);
    }

    /**
     * @return mixed
     */
    public function filterColors(): mixed
    {
        $products = $this->allProducts();

        $result = $this->unicJsonService->getUnicTitleColor($products);

        return $result->sortBy('title');
    }

    /**
     * @return mixed
     */
    public function filterSizes(): mixed
    {
        $products = $this->allProducts();

        $result = $this->unicJsonService->getUnicTitleSize($products);

        return $result->sortBy('title');
    }

    /**
     * @param  array  $request
     * @param  string  $class
     * @return mixed
     *
     * @throws BindingResolutionException
     */
    public function filterAble(array $request, string $class): mixed
    {
        return app()->make($class, ['queryParams' => array_filter($request)]);
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
