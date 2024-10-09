<?php

namespace Database\Seeders;

use App\Models\Page;
use FakeParagraph;
use Illuminate\Database\Seeder;

class ReturnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'title:ru' => 'Обмен и возврат',
            'title:uk' => 'Обмін та повернення',

            'description:ru' => FakeParagraph::countParagraph(6),
            'description:uk' => FakeParagraph::countParagraph(6),
        ];

        Page::create($data);
    }
}
