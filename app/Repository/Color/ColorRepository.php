<?php

namespace App\Repository\Color;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

class ColorRepository implements ColorRepositoryInterface
{
    public function getAllColors(): ?Collection
    {
        return Color::query()->withTranslation()->oldest('id')->get();
    }

    public function getColorsFromJsonData(array $json): ?Collection
    {
        return Color::whereIn('id', $json)->with('translations')->get();
    }

    public function getColorFromTitleTranslate(string $title): ?Color
    {
        return Color::query()->whereTranslation('title', $title)->first();
    }
}
