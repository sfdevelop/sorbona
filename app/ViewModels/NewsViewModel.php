<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Manufacturer;
use App\Repository\Article\ArticleRepositoryInterface;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Manufacture\ManufactureRepositoryInterface;

class NewsViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct()
    {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

    public function news()
    {
        return app()
            ->make(ArticleRepositoryInterface::class)
            ->getAllArticles();
    }
}
