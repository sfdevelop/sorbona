<?php

namespace App\Repository\Offer;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Collection;

class OfferRepository implements OfferRepositoryInterface
{
    public function getAllOffers(): ?Collection
    {
        return Offer::query()
            ->trans()
            ->oldest('sort')
            ->get();
    }
}
