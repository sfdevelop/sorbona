<?php

namespace App\Repository\Benefits;

use App\Models\Benefit;
use Illuminate\Database\Eloquent\Collection;

class BenefitRepository implements BenefitRepositoryInterface
{

    public function __construct(protected Benefit $benefit) {}

    public function getAllBenefits(): Collection
    {
        return $this->benefit
            ->query()
            ->trans()
            ->oldest('sort')
            ->get();
    }
}