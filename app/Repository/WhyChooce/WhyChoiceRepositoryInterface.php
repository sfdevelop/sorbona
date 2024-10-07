<?php

namespace App\Repository\WhyChooce;

use Illuminate\Database\Eloquent\Collection;

interface WhyChoiceRepositoryInterface
{
    public function getAllWyChoice(): ?Collection;
}
