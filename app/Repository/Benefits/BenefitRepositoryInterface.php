<?php

namespace App\Repository\Benefits;

use Illuminate\Database\Eloquent\Collection;

interface BenefitRepositoryInterface
{
    public function getAllBenefits(): Collection;
}
