<?php

namespace App\Repository\Currency;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    public function getAllCurrency(): Collection
    {
        return Currency::query()
            ->oldest('title')
            ->get();
    }
}
