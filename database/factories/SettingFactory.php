<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'address:en' => 'Country — 785 15h Street Office 478 City, 81566',
            'address:uk' => 'Country — 785 15h Street Office 478 City, 81566',

            'work:en' => 'Mo-Sa: 09.00-18.00',
            'work:uk' => 'Mo-Sa: 09.00-18.00',

            'weekend:en' => 'Su: 10.00-15.00',
            'weekend:uk' => 'Su: 10.00-15.00',

            'text:en' => 'Lorem ipsum dolor sit amet consectetur. In ipsum lorem cursus tellus vulputate elit ullamcorper quam. Et morbi interdum nulla feugiat dolor eleifend imperdiet adipiscing.',
            'text:uk' => 'Lorem ipsum dolor sit amet consectetur. In ipsum lorem cursus tellus vulputate elit ullamcorper quam. Et morbi interdum nulla feugiat dolor eleifend imperdiet adipiscing.',

            'email' => 'example@gmai.com',
            'phone' => '+38 (050) 313 - 21- 13',
            'phone2' => '+38 (050) 313 - 21- 13',

            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'linkedin' => 'https://linkedin.com/',
        ];
    }
}
