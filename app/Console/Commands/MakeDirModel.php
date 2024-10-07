<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Str;

class MakeDirModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom-view {model} {--single}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Створення теки з назвою моделі та повним CRUD у ній';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $folder = $this->argument('model');
        $path = "resources/views/admin/$folder";

        if (! File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        if (! $this->option('single')) {
            File::copy('resources/copyFile/create.blade.php', "$path/create.blade.php");
            File::copy('resources/copyFile/index.blade.php', "$path/index.blade.php");
            File::copy('resources/copyFile/update.blade.php', "$path/update.blade.php");

            $pathPartials = "resources/views/admin/$folder/partials";

            if (! File::isDirectory($pathPartials)) {
                File::makeDirectory($pathPartials, 0777, true, true);
            }

            $upper = Str::camel('form_'.$folder);
            File::copy('resources/copyFile/partials/form.blade.php', "$path/partials/$upper.blade.php");
        }

        if ($this->option('single')) {
            File::copy('resources/copyFile/single/update.blade.php', "$path/update.blade.php");

            $pathPartials = "resources/views/admin/$folder/partials";

            if (! File::isDirectory($pathPartials)) {
                File::makeDirectory($pathPartials, 0777, true, true);
            }

            $upper = Str::camel('form_'.$folder);
            File::copy('resources/copyFile/single/partials/form.blade.php', "$path/partials/$upper.blade.php");
        }

        $this->info('Тека створена, все успішно');
    }
}
