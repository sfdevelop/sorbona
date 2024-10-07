<?php

namespace App\Actions;

use App\Models\Feedback;
use Lorisleiva\Actions\Concerns\AsAction;

class NewItemCountAction
{
    use AsAction;

    public function handle(object $type): int
    {
        return Feedback::query()->where('is_new', true)->where('type', $type)->count();
    }
}
