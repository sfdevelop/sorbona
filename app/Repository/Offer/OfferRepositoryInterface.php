<?php

namespace App\Repository\Offer;

use Illuminate\Database\Eloquent\Collection;

interface OfferRepositoryInterface
{
    public function getAllOffers(): ?Collection;
}
