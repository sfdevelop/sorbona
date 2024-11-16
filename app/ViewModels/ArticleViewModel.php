<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Article;
use App\Models\Manufacturer;
use App\Repository\Article\ArticleRepositoryInterface;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Manufacture\ManufactureRepositoryInterface;

class ArticleViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(public Article $article)
    {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

    public function randomArticles()
    {
        return app()
            ->make(ArticleRepositoryInterface::class)
            ->getRandomArticles($this->article->id);
    }
}
