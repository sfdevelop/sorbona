<?php

namespace App\Repository\Size;

use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;

interface SizeRepositoryInterface
{
    public function getAllSizes(): ?Collection;

    public function getSizesFromJsonData(array $json): ?Collection;

    public function getSizeFromTitleTranslate(string $title): ?Size;
}
