<?php

namespace App\Repository\Article;

interface ArticleRepositoryInterface
{
    public function getAllArticles();

    public function getRandomArticles(int $id);
}
