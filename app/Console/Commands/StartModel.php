<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

use function Laravel\Prompts\note;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class StartModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:start-model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Формування автоматичних даних для моделі та верстки ';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = text(
            label: 'Введіть ім\'я моделі',
            required: true
        );

        $param = select(
            'Формувати single контролер',
            ['Так', 'Ні'],
            default: 'Ні',
        );

        $translationQuest = select(
            'Формувати модель для перекладу',
            ['Так', 'Ні'],
            default: 'Так',
        );

        if ($param == 'Ні') {
            Artisan::call('make:model', [
                'name' => \Str::ucfirst($name),
                '-a' => true,
            ]);

            Artisan::call('make:custom-view', [
                'model' => \Str::lcfirst($name),
            ]);
        }

        if ($param == 'Так') {
            Artisan::call('make:model', [
                'name' => \Str::ucfirst($name),
                '-m' => true,
            ]);

            Artisan::call('make:controller', [
                'name' => \Str::ucfirst($name),
                '--singleton' => true,
            ]);

            Artisan::call('make:custom-view', [
                'model' => \Str::lcfirst($name),
                '--single' => true,
            ]);
        }

        if ($translationQuest == 'Так') {
            Artisan::call('make:model', [
                'name' => \Str::ucfirst($name).'Translation',
                '-m' => true,
            ]);
        }

        note('Шалость вдалася');
    }
}
