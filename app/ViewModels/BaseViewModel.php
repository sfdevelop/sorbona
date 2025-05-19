<?php

namespace App\ViewModels;

use App\Models\Category;
use Spatie\ViewModels\ViewModel;

class BaseViewModel extends ViewModel
{
    public function categories()
    {
        return Category::query()
            ->whereNull('category_id')
            ->withCount(['childrenCategories', 'products'])
            ->with([
                'childrenCategories' => function ($query) {
                    $query->withCount('products');
                }, 'childrenCategories.childrenCategories' => function ($query,
                ) {
                    $query->withCount('products');
                },
            ])
            ->trans()
            ->oldest('sort')
            ->once();
    }
}
