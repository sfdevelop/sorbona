<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const SKU = 'sku';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::SKU => [$this, 'sku'],
        ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder->whereTranslationLike('title', '%'.$value.'%');
    }

    public function sku(Builder $builder, $value): void
    {
        $builder->where('sku', $value);
    }
}
