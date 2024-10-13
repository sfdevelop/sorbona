<?php

namespace App\Repository\Currency;

use Illuminate\Database\Eloquent\Collection;

interface CurrencyRepositoryInterface
{
    public function getAllCurrency(): Collection;
}