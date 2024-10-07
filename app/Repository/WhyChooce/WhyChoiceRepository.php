<?php

namespace App\Repository\WhyChooce;

use App\Models\WhyChoose;
use Illuminate\Database\Eloquent\Collection;

class WhyChoiceRepository implements WhyChoiceRepositoryInterface
{
    public function getAllWyChoice(): ?Collection
    {
        return WhyChoose::query()
            ->trans()
            ->oldest('sort')
            ->get();
    }
}
