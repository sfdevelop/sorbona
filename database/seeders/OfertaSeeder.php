<?php

namespace Database\Seeders;

use App\Models\Page;
use FakeParagraph;
use Illuminate\Database\Seeder;

class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'title:ru' => 'Договор оферты',
            'title:uk' => 'Договір оферти',

            'description:ru' => FakeParagraph::countParagraph(6),
            'description:uk' => FakeParagraph::countParagraph(6),
        ];

        Page::create($data);
    }
}
