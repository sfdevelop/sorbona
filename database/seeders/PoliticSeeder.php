<?php

namespace Database\Seeders;

use App\Models\Page;
use FakeParagraph;
use Illuminate\Database\Seeder;

class PoliticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'title:ru' => 'Политика конфиденциальности',
            'title:uk' => 'Политика конфиденциальности',

            'description:ru' => FakeParagraph::countParagraph(6),
            'description:uk' => FakeParagraph::countParagraph(6),
        ];

        Page::create($data);
    }
}
