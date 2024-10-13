<?php

namespace App\Repository\Category;

use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function getAllCategoriesOnce(): array|Collection;

    public function getAllCategoriesWithTrans(): array|Collection;

    public function getParentCategoriesOnce(): array|Collection;

    public function getCategoriesWithoutChildrenCategories(): array|Collection;

    public function getCategoriesInMainPage(): array|Collection;

    public function getMainCategoriesWithChildrenOneLevel();

    public function categoriesWithoutChildrenCategory(): array|Collection;
}
