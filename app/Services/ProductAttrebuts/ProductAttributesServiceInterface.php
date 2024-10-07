<?php

namespace App\Services\ProductAttrebuts;

use Illuminate\Database\Eloquent\Collection;

interface ProductAttributesServiceInterface
{
    public function getArrayColorsAttr(array|Collection $colorsArray);

    public function getArraySizesAttr(array|Collection $sizesArray);
}
