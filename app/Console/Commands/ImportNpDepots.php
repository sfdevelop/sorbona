<?php

namespace App\Console\Commands;

use App\Components\ImportDataNp;
use App\Models\NovaPochta\NovaPochtaDepot;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class ImportNpDepots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:np-depots';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import NovaPochta depots';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     *
     * @throws GuzzleException
     */
    public function handle(): void
    {
        $this->info('Starting getting depots '.date('Y-m-d H:i:s'));
        $import = new ImportDataNp;
        $response = $import->client->request('GET', 'json/', [
            'json' => [
                'modelName' => 'AddressGeneral',
                'calledMethod' => 'getWarehouses',
                'apiKey' => env('NOVA_POCHTA_API_KEY'),
                'methodProperties' => [
                    'Limit' => 150,
                ],
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());

        if ($data->success) {
            //          Truncate cities table

            $totalCount = $data->info->totalCount;
            $pages = ceil($totalCount / 150);

            $this->info('Total pages: '.$pages);

            for ($i = 1; $i <= $pages; $i++) {
                $this->info('Fetch page '.$i.' of '.$pages);

                $response = $import->client->request('POST', 'json/', [
                    'json' => [
                        'modelName' => 'AddressGeneral',
                        'calledMethod' => 'getWarehouses',
                        'apiKey' => env('NOVA_POCHTA_API_KEY'),
                        'methodProperties' => [
                            'Limit' => 150,
                            'Page' => "$i",
                        ],
                    ],
                ]);

                $data = json_decode($response->getBody()->getContents());
                if ($data->success) {
                    foreach ($this->getData($data->data) as $item) {
                        NovaPochtaDepot::firstOrCreate([
                            'ref' => $item->Ref,
                        ], [
                            'ref' => $item->Ref,
                            'city_ref' => $item->CityRef,
                            'name_ru' => $item->DescriptionRu,
                            'name_uk' => $item->Description,
                            'depot_number' => $item->Number,
                            'is_pochtomat' => str_contains($item->DescriptionRu, 'Почтомат'),
                        ]);
                    }
                }
            }
        }

        $this->info('NovaPochta depots has been successfully imported!');
    }

    /**
     * @param  $data
     * @return \Generator
     */
    private function getData($data): \Generator
    {
        foreach ($data as $item) {
            yield $item;
        }
    }
}
