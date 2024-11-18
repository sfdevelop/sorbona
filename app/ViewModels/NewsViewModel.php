<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Repository\Article\ArticleRepositoryInterface;

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
