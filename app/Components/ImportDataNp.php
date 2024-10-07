<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataNp
{
    public $client;

    /**
     * ImportDataNp constructor.
     *
     * @param  $client
     */
    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.novaposhta.ua/v2.0/',
            // You can set any number of default request options.
            //            'timeout'  => 2.0,
            'verify' => false,
        ]);
    }
}
