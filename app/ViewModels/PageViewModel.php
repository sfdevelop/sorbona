<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Product;

class PageViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
    ) {
        //        $this->setSeoData($this->product);
    }
}
