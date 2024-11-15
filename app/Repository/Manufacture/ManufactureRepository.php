<?php

namespace App\Repository\Manufacture;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Collection;

class ManufactureRepository implements ManufactureRepositoryInterface
{
    public function getAllManufacturers(): array|Collection
    {
        return Manufacturer::query()
            ->withTranslation()
            ->orderByTranslation('title')
            ->get();
    }

    public function getAllManufacturersFromFront(): array|Collection
    {
        return Manufacturer::query()
            ->trans()
            ->oldest('sort')
            ->get();
    }
}