<?php

namespace App\Services\Manufacturer;

class ManufacturerService
{
    final public function getBrandArrayFromUrl(): array
    {
        $currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')
            ."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $parsedUrl = parse_url($currentUrl);

        if (isset($parsedUrl['query'])) {
            $params = $parsedUrl['query'];

            $params = preg_replace('/(\$brand=)([^&]*)/', 'brand[]=$2', $params);

            preg_match_all('/brand=([^&]*)/', $params, $matches);
        }

        return $matches[1] ?? [];
    }
}
