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

            'address:ru' => 'Украина, г.Харьков, пр. Московский, 196/1 студия "АртУм"',
            'address:uk' => 'Украина, г.Харьков, пр. Московский, 196/1 студия "АртУм"',

            'textForMail:ru' => 'Интернет-магазин запорно-сантехнической арматуры в Украине. Официальный дилер FADO в Харькове и области',
            'textForMail:uk' => 'Интернет-магазин запорно-сантехнической арматуры в Украине. Официальный дилер FADO в Харькове и области',

            'cooperate:ru' => '© 2023 SORBONA. Всі права захищені',
            'cooperate:uk' => '© 2023 SORBONA. Всі права захищені',

            'email' => 'example@gmai.com',
            'phone' => '+38 (050) 323 6661',
            'phone2' => '+38 (050) 323 6661',
            'website' => 'yvboyko@yandex.ru',
            'map' => '',

            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
        ];
    }
}
