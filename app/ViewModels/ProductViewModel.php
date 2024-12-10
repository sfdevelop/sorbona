<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Product;
use App\Repository\Product\ProductRepositoryInterface;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

class ProductViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
        public Product $product,
    ) {
        //        $this->setSeoData($this->product);
    }

    /**
     * @return MediaCollection
     */
    public function allManyPhotos(): MediaCollection
    {
        $photos = $this->product->getMedia('additional_photo_product');

        $photos = $photos->reverse()->push($this->product->getMedia('product')->first());

        return $photos->reverse();
    }

    public function characteristics()
    {
        return $this->product->filterValues;
    }

    public function miniOptions()
    {
        return $this->characteristics()->take(3);
    }

    public function randomItems()
    {
        return app()
            ->make(ProductRepositoryInterface::class)
            ->getCategoryRandomProductsWithoutSelf(
                category_id: $this->product->category_id,
                thisProductId: $this->product->id,
            );
    }

    public function seeProducts()
    {
        if (session('recently_viewed')) {
            $idProducts = session('recently_viewed');

            return app()
                ->make(ProductRepositoryInterface::class)
                ->getProductsInIds($idProducts);
        }

        return collect([]);
    }
}
