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
}