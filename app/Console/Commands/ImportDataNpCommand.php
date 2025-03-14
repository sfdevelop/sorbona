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
        $import = new ImportDataNp;
        $response = $import->client->request('GET', 'json/', [
            'json' => [
                'modelName' => 'AddressGeneral',
                'calledMethod' => 'getWarehouses',
                'methodProperties' => [
                    'Language' => 'ua',
                    // "CityName" => "Прилуки"
                ],
                'apiKey' => config('custom.API_NOVA_POCHTA_KEY'),
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());

        foreach ($this->getWarehouseData($data->data) as $item) {
            $detachment = NovaPochtaDetachment::firstOrCreate([
                'address' => $item->Description,
            ]);

            $detachment->translateOrNew('uk')->region = $item->SettlementAreaDescription;
            $detachment->translateOrNew('uk')->city = $item->CityDescription;
            $detachment->translateOrNew('uk')->address = $item->Description;

            $regionTranslations = $this->getRegionTranslations();

            $regionRu = $regionTranslations[$item->SettlementAreaDescription] ??
                $item->SettlementAreaDescription;

            $detachment->translateOrNew('ru')->region = $regionRu;
            $detachment->translateOrNew('ru')->city = $item->CityDescriptionRu;
            $detachment->translateOrNew('ru')->address = $item->DescriptionRu;

            $detachment->save();
        }
        $this->info('Створили відділення Нової Пошти з українськими та російськими перекладами');
    }

    /**
     * @param  $data
     * @return \Generator
     */
    private function getWarehouseData($data): \Generator
    {
        foreach ($data as $item) {
            //            dd($item);
            yield $item;
        }
    }

    private function getRegionTranslations(): array
    {
        return [
            'Вінницька' => 'Винницкая',
            'Волинська' => 'Волынская',
            'Дніпропетровська' => 'Днепропетровская',
            'Донецька' => 'Донецкая',
            'Житомирська' => 'Житомирская',
            'Закарпатська' => 'Закарпатская',
            'Запорізька' => 'Запорожская',
            'Івано-Франківська' => 'Ивано-Франковская',
            'Київська' => 'Киевская',
            'Кіровоградська' => 'Кировоградская',
            'Луганська' => 'Луганская',
            'Львівська' => 'Львовская',
            'Миколаївська' => 'Николаевская',
            'Одеська' => 'Одесская',
            'Полтавська' => 'Полтавская',
            'Рівненська' => 'Ровенская',
            'Сумська' => 'Сумская',
            'Тернопільська' => 'Тернопольская',
            'Харківська' => 'Харьковская',
            'Херсонська' => 'Херсонская',
            'Хмельницька' => 'Хмельницкая',
            'Черкаська' => 'Черкасская',
            'Чернівецька' => 'Черновицкая',
            'Чернігівська' => 'Черниговская',
            'Автономна Республіка Крим' => 'Автономная Республика Крым',
            'м. Київ' => 'г. Киев',
            'м. Севастополь' => 'г. Севастополь',
        ];
    }
}
