<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait TranslateScopeTrait
{
    public function scopeTrans(Builder $query): void
    {
        $query->withTranslation()->translatedIn(app()->getLocale());
    }
}
