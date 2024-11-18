<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilterValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filters = \App\Models\Filter::all();

        for ($i = 0; $i < 10; $i++) {
            foreach ($filters as $filter) {
                $filter->filterValues()->create([
                    'title:ru' => fake()->text(10),
                    'title:uk' => fake()->text(10),
                ]);
            }
        }
    }
}
