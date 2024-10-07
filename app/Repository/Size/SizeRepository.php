<?php

namespace App\Repository\Size;

use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;

class SizeRepository implements SizeRepositoryInterface
{
    public function getAllSizes(): ?Collection
    {
        return Size::query()->withTranslation()->oldest('id')->get();
    }

    public function getSizesFromJsonData(array $json): ?Collection
    {
        return Size::whereIn('id', $json)->with('translations')->get();
    }

    public function getSizeFromTitleTranslate(string $title): ?Size
    {
        return Size::query()->whereTranslation('title', $title)->first();
    }
}
