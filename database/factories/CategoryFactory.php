<?php

namespace Database\Factories;

use App\Models\Category;
use FakeParagraph;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
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
            'title:ru' => $faker->realText(rand(25, 40)),
            'title:uk' => $faker->realText(rand(25, 40)),

            'description:ru' => FakeParagraph::countParagraph(4, 12),
            'description:uk' => FakeParagraph::countParagraph(4, 12),
        ];
    }
}
