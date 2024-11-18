<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Article;
use App\Repository\Article\ArticleRepositoryInterface;

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
