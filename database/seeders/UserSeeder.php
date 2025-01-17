<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user) {
            $user->delete();
        });

        $data = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => 'password', // password
            'remember_token' => Str::random(10),
        ];
        //        User::factory(1)->create();
        $userAdmin = User::create($data);
        $userAdmin->assignRole('admin');

        $data = [
            'name' => 'user',
            'email' => 'user@admin.com',
            'email_verified_at' => now(),
            'password' => 'password', // password
            'remember_token' => Str::random(10),
        ];
        //        User::factory(1)->create();
        $userUser = User::create($data);
        $userUser->assignRole('user');

        $data = [
            'name' => 'smallopt',
            'email' => 'smallopt@admin.com',
            'email_verified_at' => now(),
            'password' => 'password', // password
            'remember_token' => Str::random(10),
        ];
        //        User::factory(1)->create();
        $userSmallOpt = User::create($data);
        $userSmallOpt->assignRole('smallopt');

        $data = [
            'name' => 'bigopt',
            'email' => 'bigopt@admin.com',
            'email_verified_at' => now(),
            'password' => 'password', // password
            'remember_token' => Str::random(10),
        ];
        //        User::factory(1)->create();
        $userBigOpt = User::create($data);
        $userBigOpt->assignRole('bigopt');

    }
}
