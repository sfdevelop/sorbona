<?php

namespace App\Repository\Article;

use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{

    public function getAllArticles();

    public function getRandomArticles(int $id);
}