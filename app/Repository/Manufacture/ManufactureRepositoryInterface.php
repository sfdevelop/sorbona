<?php

namespace App\Repository\Manufacture;

use Illuminate\Database\Eloquent\Collection;

interface ManufactureRepositoryInterface
{
    public function getAllManufacturers(): array|Collection;
    public function getAllManufacturersFromFront(): array|Collection;


}