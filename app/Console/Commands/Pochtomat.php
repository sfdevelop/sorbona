<?php

namespace App\Console\Commands;

use App\Models\NovaPochtaDetachment;
use App\Models\StatesNovaPochta;
use Illuminate\Console\Command;

class Pochtomat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:pochtomat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Формування відділень';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $locales = config('translatable.locales', ['uk', 'ru']); // Отримуємо доступні мови з конфігурації
        $count = 0;

        foreach ($this->getItemsNoPochtomats() as $itemNoPochtomat) {
            // Створюємо базовий запис відділення без умов
            $stateNP = new StatesNovaPochta;
            $stateNP->save(); // Зберігаємо спочатку базовий запис, щоб отримати ID

            // Копіюємо переклади для всіх доступних мов
            foreach ($locales as $locale) {
                // Перевіряємо, чи є переклад для цієї мови
                if ($itemNoPochtomat->hasTranslation($locale)) {
                    // Отримуємо дані перекладу
                    $translation = $itemNoPochtomat->getTranslation($locale);

                    // Зберігаємо переклад для поточної мови
                    $stateNP->translateOrNew($locale)->region = $translation->region ?? null;
                    $stateNP->translateOrNew($locale)->city = $translation->city ?? null;
                    $stateNP->translateOrNew($locale)->address = $translation->address ?? null;
                } else {
                    // Якщо перекладу немає, використовуємо дані з поточної мови
                    $currentTranslation = $itemNoPochtomat->getTranslation(app()->getLocale(), false);
                    $stateNP->translateOrNew($locale)->region = $currentTranslation->region ?? null;
                    $stateNP->translateOrNew($locale)->city = $currentTranslation->city ?? null;
                    $stateNP->translateOrNew($locale)->address = $currentTranslation->address ?? null;
                }
            }

            // Зберігаємо модель з перекладами
            $stateNP->save();
            $count++;

            if ($count % 100 === 0) {
                $this->info("Оброблено {$count} відділень");
            }
        }

        $this->info("Всього оброблено {$count} відділень. Процес завершено.");
    }

    private function getItemsNoPochtomats(): \Generator
    {
        // Використовуємо спеціальний метод для пошуку в перекладах
        // Використовуємо спеціальний метод для пошуку в перекладах
        // Шукаємо записи, де адреса НЕ містить слово "Поштомат"
        $query = NovaPochtaDetachment::whereDoesntHave('translations', function($q) {
            $q->where('address', 'LIKE', '%Поштомат%')
                ->orWhere('address', 'LIKE', '%поштомат%')
                ->orWhere('address', 'LIKE', '%ПОШТОМАТ%');
        });

        foreach ($query->cursor() as $item) {
            yield $item;
        }
    }
}
