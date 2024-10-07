<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Category;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Setting\SettingRepositoryInterface;

class SubCategoryViewModel extends BaseViewModel
{
//    use CustomSeoTrait;

    public function __construct(
        public Category $category,

    ) {
//        $this->setSeoData($this->settingsRepository->getSetting());
    }

    /**
     * @return mixed
     */
    public function subCategories(): mixed
    {
        return $this->category->childrenCategories->paginate(12);
    }
}
