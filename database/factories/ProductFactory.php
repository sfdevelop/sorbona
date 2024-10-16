<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker =   \Faker\Factory::create('ru_RU');
        return [
            'title:ru' => $faker->realText(50),
            'title:uk' => $faker->realText(50),

            'description:ru' => \FakeParagraph::countParagraph(4, 12),
            'description:uk' => \FakeParagraph::countParagraph(4, 12),

            'price' => rand(5000, 7000),


            'category_id'=>Category::query()->inRandomOrder()->value('id'),
            'manufacturer_id'=>Manufacturer::query()->inRandomOrder()->value('id'),
            'currency_id'=>Currency::query()->inRandomOrder()->value('id'),

            'sku' => rand(100, 500),
            'sale' => fake()->boolean(20) ? rand(10, 25) : null,

            'priceTen' => rand(4000, 5000),
            'priceTwenty' => rand(3800, 4000),
            'is_top' => fake()->boolean(10),
            'is_new' => fake()->boolean(15),

            'qtyMilkoopt' => rand(20, 30),
            'qtyOpt' => rand(50, 70),

        ];
    }
}
