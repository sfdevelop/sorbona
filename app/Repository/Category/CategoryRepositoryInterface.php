<?php

namespace App\Repository\Category;

use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function getAllCategoriesOnce(): ?Collection;

    public function getAllCategoriesWithTrans(): ?Collection;

    public function getParentCategoriesOnce(): ?Collection;

    public function getCategoriesWithoutChildrenCategories(): ?Collection;

    public function getCategoriesInMainPage(): array|Collection;
}
