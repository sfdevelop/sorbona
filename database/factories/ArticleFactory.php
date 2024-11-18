<?php

namespace Database\Factories;

use App\Models\Category;
use FakeParagraph;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ru_RU');

        return [
            'title:ru' => $faker->realText(50),
            'title:uk' => $faker->realText(50),

            'description:ru' => FakeParagraph::countParagraph(4, 12),
            'description:uk' => FakeParagraph::countParagraph(4, 12),
        ];
    }
}
