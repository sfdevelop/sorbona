<?php

namespace App\Repository\Color;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

interface ColorRepositoryInterface
{
    public function getAllColors(): ?Collection;

    public function getColorsFromJsonData(array $json): ?Collection;

    public function getColorFromTitleTranslate(string $title): ?Color;
}
