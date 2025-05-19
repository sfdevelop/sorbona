<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NPSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Початок імпорту даних Нової Пошти...');

        // Шлях до SQL файлу
        $sqlFilePath = public_path('sql/NP.sql');

        // Перевіряємо, чи існує файл
        if (! File::exists($sqlFilePath)) {
            $this->command->error('Файл SQL не знайдено за шляхом: '.$sqlFilePath);

            return;
        }

        // Отримуємо вміст SQL файлу
        $sql = File::get($sqlFilePath);

        // Розділяємо файл на окремі запити за допомогою роздільника ";"
        $statements = array_filter(array_map('trim', explode(';', $sql)), function ($statement) {
            return ! empty($statement);
        });

        // Вимикаємо перевірку зовнішніх ключів для швидшого імпорту
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Виконуємо кожен запит окремо
        $count = 0;
        $total = count($statements);

        foreach ($statements as $statement) {
            try {
                DB::unprepared($statement);
                $count++;

                // Виводимо прогрес кожні 100 запитів
//                if ($count % 100 === 0 || $count === $total) {
//                    $this->command->info("Оброблено {$count} з {$total} запитів");
//                }
            } catch (\Exception $e) {
//                $this->command->error('Помилка при виконанні запиту: '.$e->getMessage());
            }
        }

        // Вмикаємо перевірку зовнішніх ключів
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->command->info('Імпорт даних Нової Пошти завершено успішно!');
    }
}
