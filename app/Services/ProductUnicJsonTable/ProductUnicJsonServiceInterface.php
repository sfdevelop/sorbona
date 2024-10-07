<?php

namespace App\Services\ProductUnicJsonTable;

use Illuminate\Database\Eloquent\Collection;

interface ProductUnicJsonServiceInterface
{
    public function getUnicTitleColor(Collection $products);

    public function getUnicTitleSize(Collection $products);
}
