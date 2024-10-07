<?php

namespace App\Repository\Slider;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Collection;

class SliderRepository implements SliderRepositoryInterface
{
    public function getAllSliders(): ?Collection
    {
        return Slider::query()
            ->trans()
            ->oldest('sort')
            ->get();
    }
}
