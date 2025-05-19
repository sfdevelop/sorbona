<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends AbstractFilter
{
    public const TITLE = 'title';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
        ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder
            ->whereTranslationLike('title', '%'.$value.'%');
        //            ->orWhereHas('childrenCategories',
        //                function (Builder $query) use ($value) {
        //                    $query->whereTranslationLike('title', '%'.$value.'%');
        //                })
        //            ->orWhereHas('childrenCategories.childrenCategories',
        //                function (Builder $query) use ($value) {
        //                    $query->whereTranslationLike('title', '%'.$value.'%');
        //                });
    }
}
