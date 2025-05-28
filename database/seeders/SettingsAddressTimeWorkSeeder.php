<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsAddressTimeWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Отримуємо ID запису з таблиці settings
        $settingId = DB::table('settings')->first()->id ?? null;
        
        if ($settingId) {
            // Додаємо переклад для української мови
            DB::table('setting_translations')->updateOrInsert(
                [
                    'setting_id' => $settingId,
                    'locale' => 'uk',
                ],
                [
                    'default_address' => 'Україна, м.Харків, пр. Московський, 196/1 студія "АртУм"',
                    'default_time_work' => 'Пн - Нд 10:00 - 17:00',
                ]
            );
            
            // Додаємо переклад для російської мови
            DB::table('setting_translations')->updateOrInsert(
                [
                    'setting_id' => $settingId,
                    'locale' => 'ru',
                ],
                [
                    'default_address' => 'Украина, г.Харьков, пр. Московский, 196/1 студия "АртУм"',
                    'default_time_work' => 'Пн - Вс 10:00 - 17:00',
                ]
            );
        }
    }
}