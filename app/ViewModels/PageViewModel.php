<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Product;
use App\Repository\Product\ProductRepositoryInterface;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

class PageViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
    ) {
        //        $this->setSeoData($this->product);
    }
}
