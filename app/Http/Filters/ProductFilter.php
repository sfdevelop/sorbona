<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const COLORS = 'colors';

    protected function getCallbacks(): array
    {
        return [
            self::COLORS => [$this, 'colors'],
        ];
    }

    /**
     * @param  Builder  $builder
     * @param  $value
     * @return void
     */
    public function colors(Builder $builder, $value): void
    {
        $array = explode(',', $value);

        $builder->whereHas('productColors', function ($query) use ($array) {
            $query->whereIn('color_id', $array);
        });
    }
}
