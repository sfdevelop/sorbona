<?php

namespace App\Console\Commands;

use App\Jobs\PresaleMailJob;
use Illuminate\Console\Command;

class presaleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:presale-send-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Відсилаємо листа користувачам, які мають товари в списку wishlist';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        PresaleMailJob::dispatch();

        $this->info('Листи надіслані та відповідні записи видалені з wishlist.');
    }
}
