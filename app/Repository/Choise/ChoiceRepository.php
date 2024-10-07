<?php

namespace App\Repository\Choise;

use App\Models\Chose;
use Illuminate\Database\Eloquent\Collection;

class ChoiceRepository implements ChoiceRepositoryInterface
{
    /**
     * @return Collection|null
     */
    public function getAllChoices(): ?Collection
    {
        return Chose::query()
            ->trans()
            ->oldest('sort')
            ->get();
    }
}
