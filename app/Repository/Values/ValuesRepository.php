<?php

namespace App\Repository\Values;

use App\Models\Values;
use Illuminate\Database\Eloquent\Collection;

class ValuesRepository implements ValuesRepositoryInterface
{
    public function getAllValues(): ?Collection
    {
        return Values::query()
            ->trans()
            ->oldest('sort')
            ->get();
    }
}
