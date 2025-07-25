<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportAllData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:alldata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import NP data and then import pochtomat data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
	$this->info('Start: '.date('Y-m-d H:i:s'));

        $this->call('import:npdata');
//exit;

//        $this->call('import:pochtomat');

	$this->info('End: '.date('Y-m-d H:i:s'));
        $this->info('All data imported successfully!');
    }
}
