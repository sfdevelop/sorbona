<?php

namespace App\Repository\Slider;

use Illuminate\Database\Eloquent\Collection;

interface SliderRepositoryInterface
{
    public function getAllSliders(): ?Collection;
}
