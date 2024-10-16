<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const SKU = 'sku';
    public const CATEGORY_ID = 'category_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::SKU => [$this, 'sku'],
            self::CATEGORY_ID => [$this, 'category_id'],
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

    public function category_id(Builder $builder, $value): void
    {
        $builder->where('category_id', $value);
    }
}
