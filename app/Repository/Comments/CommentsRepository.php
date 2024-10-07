<?php

namespace App\Repository\Comments;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentsRepository implements CommentsRepositoryInterface
{
    public function getCommentToTake(int $take = 12): Collection
    {
        return Comment::query()
            ->with('product')
            ->public()
            ->latest('id')
            ->take($take)
            ->get();
    }
}
