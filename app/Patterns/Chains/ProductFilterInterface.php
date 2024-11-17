<?php

namespace App\Patterns\Chains;

use Illuminate\Database\Eloquent\Collection;

interface ProductFilterInterface
{
    public function apply(Collection $products): Collection;
}