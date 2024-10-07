<?php

namespace App\Repository\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategoriesOnce(): Collection
    {
        return Category::query()
            ->withTranslation()
            ->oldest('sort')
            ->once();
    }

    public function getAllCategoriesWithTrans(): Collection
    {
        return Category::query()
            ->trans()
            ->oldest('sort')
            ->get();
    }

    public function getParentCategoriesOnce(): Collection
    {
        return Category::query()
            ->whereNull('category_id')
            ->withTranslation()
            ->oldest('sort')
            ->once();
    }

    public function getCategoriesWithoutChildrenCategories(): Collection
    {
        return Category::query()
            ->whereNull('category_id')
            ->withCount('childrenCategories')
            ->withTranslation()
            ->oldest('sort')
            ->get();
    }

    public function getCategoriesInMainPage(): array|Collection
    {
        return Category::query()
            ->trans()
            ->where('in_main', true)
            ->oldest('sort')
            ->get();
    }

    public function getMainCategoriesWithChildrenOneLevel()
    {
        $ddd =  Category::query()
            ->withTranslation() // Предварительно загружаем названия категорий
            ->whereNull('category_id') // Выбираем только родительские категории
            ->with(['childrenCategories']) // Предварительно загружаем подкатегории
            ->oldest('sort')
            ->get()
            ->flatMap(function ($category) {
                // Объединяем родительскую категорию и её подкатегории в один список
                return collect([$category])->merge($category->childrenCategories);
            });

//        dd($ddd);

        return $ddd->sortBy('title');
    }
}
