<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\ViewModels\ArticleViewModel;

class ArticleController extends BaseFrontController
{
    public function __construct(
    ) {}


    public function __invoke(Article $article)
    {
        return (new ArticleViewModel($article))->view('front.news.article');
    }
}
