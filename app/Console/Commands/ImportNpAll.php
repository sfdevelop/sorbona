<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportNpAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:np-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all NovaPochta data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Start: '.date('Y-m-d H:i:s'));

        $this->call('import:np-regions');
        $this->call('import:np-cities');
        $this->call('import:np-depots');

        $this->info('End: '.date('Y-m-d H:i:s'));
        $this->info('All data imported successfully!');
    }
}
