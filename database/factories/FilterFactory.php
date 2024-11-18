<?php

namespace Database\Factories;

use App\Facade\TranslateFacade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Filter>
 */
class FilterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $items = [
            'Тип змішувача',
            'Довжина виливу',
            'Тип управління',
            'Колір',
            'Матеріал ручки',
            'Покриття',
            'Тип монтажу',
            'Тип картриджа',
            'Тип душової лійки',
            'Діаметр душової лійки',
        ];

        $filter = $this->faker->unique()->randomElement($items);

        return [
            'title:ru' => TranslateFacade::getTranslateText($filter, 'ru'),
            'title:uk' => $filter,
        ];
    }
}
