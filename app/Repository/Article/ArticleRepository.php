<?php

namespace App\Repository\Article;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function __construct(protected Article $article) {}


    public function getAllArticles()
    {
        return $this->article
            ->query()
            ->trans()
            ->oldest('sort')
            ->paginate(5);
    }


    public function getRandomArticles(int $id)
    {
        return $this->article
            ->query()
            ->inRandomOrder()
            ->whereNot('id', $id)
            ->trans()
            ->oldest('sort')
            ->take(5)
            ->get();
    }
}