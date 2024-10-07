<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class GetMailToSendNotification
{
    use AsAction;

    public function handle()
    {
        return User::all();
    }
}
