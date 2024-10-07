<?php

namespace App\Console\Commands;

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
    protected $description = 'Формування поштоматів';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        foreach ($this->getItemsNoPochtomats() as $itemNoPochtomat) {
            \App\Models\StatesNovaPochta::firstOrCreate([
                'address' => $itemNoPochtomat->address,
            ], [
                'region' => $itemNoPochtomat->region,
                'city' => $itemNoPochtomat->city,
                'address' => $itemNoPochtomat->address,
            ]);
        }

        $this->info('Відділення готові');
    }

    private function getItemsNoPochtomats(): \Generator
    {
        $query = \App\Models\NovaPochtaDetachment::query()
            ->where('address', 'not like', '%Поштомат%');

        foreach ($query->cursor() as $item) {
            yield $item;
        }
    }
}
