<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title'    => 'UAH',
                'currency' => 1,
            ],

            [
                'title'    => 'USD',
                'currency' => 41.45,
            ],

            [
                'title'    => 'EUR',
                'currency' => 45.75,
            ],
        ];
        foreach ($data as $item) {
            Currency::query()->create($item);
        }
    }
}
