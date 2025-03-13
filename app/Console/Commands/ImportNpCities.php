<?php

namespace App\Console\Commands;

use App\Components\ImportDataNp;
use App\Models\NovaPochta\NovaPochtaCity;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class ImportNpCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:np-cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import NovaPochta cities';

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
        $this->info('Starting getting cities '.date('Y-m-d H:i:s'));
        $import = new ImportDataNp;
        $response = $import->client->request('GET', 'json/', [
            'json' => [
                'modelName' => 'Address',
                'calledMethod' => 'getCities',
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

                $response = $import->client->request('GET', 'json/', [
                    'json' => [
                        'modelName' => 'Address',
                        'calledMethod' => 'getCities',
                        'apiKey' => env('NOVA_POCHTA_API_KEY'),
                        'methodProperties' => [
                            'Limit' => 150,
                            'Page' => $i,
                        ],
                    ],
                ]);

                $data = json_decode($response->getBody()->getContents());
                if ($data->success) {
                    foreach ($this->getData($data->data) as $item) {
                        NovaPochtaCity::firstOrCreate([
                            'ref' => $item->Ref,
                        ], [
                            'ref' => $item->Ref,
                            'region_ref' => $item->Area,
                            'name_ru' => $item->DescriptionRu,
                            'name_uk' => $item->Description,
                        ]);
                    }
                }
            }
        }

        $this->info('NovaPochta regions has been successfully imported!');
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
