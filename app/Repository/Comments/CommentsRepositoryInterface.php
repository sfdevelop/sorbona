<?php

namespace App\Repository\Comments;

use Illuminate\Database\Eloquent\Collection;

interface CommentsRepositoryInterface
{
    public function getCommentToTake(int $take): Collection;
}
