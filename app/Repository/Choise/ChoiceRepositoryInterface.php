<?php

namespace App\Repository\Choise;

use Illuminate\Database\Eloquent\Collection;

interface ChoiceRepositoryInterface
{
    public function getAllChoices(): ?Collection;
}
