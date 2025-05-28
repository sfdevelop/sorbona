<?php

namespace App\Console\Commands;

use App\Components\ImportDataNp;
use App\Models\NovaPochtaDetachment;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class ImportDataNpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:npdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получаем отделения Новой почы';

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
	$this->info('Starting getting wharehouses '.date('Y-m-d H:i:s'));
        $import = new ImportDataNp;
        $response = $import->client->request('GET', 'json/', [
            'json' => [
                'modelName' => 'AddressGeneral',
                'calledMethod' => 'getWarehouses',
                'methodProperties' => [
                    'Language' => 'ua',
                    // "CityName" => "Прилуки"
                ],
                'apiKey' => env('NOVA_POCHTA_API_KEY'),
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
	$this->info('Ending getting wharehouses '.date('Y-m-d H:i:s'));
#	$this->info(print_r($data, 1));
#	exit;


        foreach ($this->getWarehouseData($data->data) as $item) {
            NovaPochtaDetachment::firstOrCreate([
                'address' => $item->Description,
            ], [
                'region' => $item->SettlementAreaDescription,
                'city' => $item->CityDescription,
                'address' => $item->Description,
            ]);
	    $this->info('Inserting detachment and exit '.date('Y-m-d H:i:s'));
	    exit;
        }
        $this->info('Створили ');
    }

    /**
     * @param  $data
     * @return \Generator
     */
    private function getWarehouseData($data): \Generator
    {
        foreach ($data as $item) {
            yield $item;
        }
    }
}
