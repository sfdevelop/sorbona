<?php

namespace App\Repository\Values;

use Illuminate\Database\Eloquent\Collection;

interface ValuesRepositoryInterface
{
    public function getAllValues(): ?Collection;
}
