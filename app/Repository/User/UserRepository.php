<?php

namespace App\Repository\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function getAdminUsersFromEmailSend(): array|Collection
    {
        return User::query()
            ->role('admin')
            ->get();
    }
}
