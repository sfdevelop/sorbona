<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'title:ru' => 'Новый',
            'title:uk' => 'Новий',
        ];

        Status::query()->create($data);
    }
}
