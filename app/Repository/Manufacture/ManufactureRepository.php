<?php

namespace App\Repository\Manufacture;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Collection;

class ManufactureRepository implements ManufactureRepositoryInterface
{

    public function __construct(protected Manufacturer $manufacturer) {}

    public function getAllManufacturers(): array|Collection
    {
        return $this->manufacturer
            ->query()
            ->withTranslation()
            ->orderByTranslation('title')
            ->get();
    }

    public function getAllManufacturersFromFront(): array|Collection
    {
        return $this->manufacturer
            ->query()
            ->trans()
            ->oldest('sort')
            ->get();
    }

    public function getManufacturersOnPage(int $take): array|Collection
    {
        return $this->manufacturer
            ->query()
            ->inRandomOrder()
            ->trans()
            ->oldest('sort')
            ->take($take)
            ->get();
    }
}