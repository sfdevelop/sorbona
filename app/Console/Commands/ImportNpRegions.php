<?php

namespace App\Console\Commands;

use App\Components\ImportDataNp;
use App\Models\NovaPochta\NovaPochtaRegion;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class ImportNpRegions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:np-regions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import NovaPochta regions';

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
        $this->info('Starting getting regions '.date('Y-m-d H:i:s'));
        $import = new ImportDataNp;
        $response = $import->client->request('GET', 'json/', [
            'json' => [
                'modelName' => 'AddressGeneral',
                'calledMethod' => 'getAreas',
                'apiKey' => env('NOVA_POCHTA_API_KEY'),
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        foreach ($this->getData($data->data) as $item) {
            NovaPochtaRegion::firstOrCreate([
                'ref' => $item->Ref,
            ], [
                'ref' => $item->Ref,
                'name_ru' => $item->DescriptionRu,
                'name_uk' => $item->Description,
            ]);
            $this->info('Inserting region '.$item->Description.' '.date('Y-m-d H:i:s'));
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
