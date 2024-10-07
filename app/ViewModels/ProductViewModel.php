<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Product;
use App\Services\ProductAttrebuts\ProductAttributesServiceInterface;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

class ProductViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
        public Product $product,
        protected ProductAttributesServiceInterface $productAttributesService
    ) {
        $this->setSeoData($this->product);
    }

    /**
     * @return MediaCollection
     */
    public function allManyPhotos(): MediaCollection
    {
        $photos = $this->product->getMedia('additional_photo_product');

        $photos = $photos->push($this->product->getMedia('product')->first());

        return $photos->reverse();
    }

    /**
     * @return array
     */
    public function colors(): array
    {
        $colorsArray = $this->product->colors;

        if ($colorsArray) {
            return $this->productAttributesService->getArrayColorsAttr($colorsArray);
        }

        return [];
    }

    /**
     * @return array
     */
    public function sizes(): array
    {
        $sizesArray = $this->product->sizes;

        if ($sizesArray) {
            return $this->productAttributesService->getArraySizesAttr($sizesArray);
        }

        return [];
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
