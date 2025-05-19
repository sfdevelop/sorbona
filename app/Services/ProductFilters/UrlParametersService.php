<?php

namespace App\Services\ProductFilters;

class UrlParametersService
{
    public function getUrlParameters($request): array
    {
        $parameters = $request;

        unset($parameters['brand'], $parameters['sort'], $parameters['page']);

        $keys = array_keys($parameters);

        $uniqueKeys = array_unique($keys);

        return array_values($uniqueKeys);
    }

    public function getParametersValues(): array
    {
        $currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $parsedUrl = parse_url($currentUrl);
        $query = $parsedUrl['query'] ?? '';

        if (empty($query)) {
            return [];
        }

        $values = [];
        $pairs = explode('&', $query);
        foreach ($pairs as $pair) {
            $parts = explode('=', $pair, 2);
            if (count($parts) == 2) {
                $key = urldecode($parts[0]);
                $value = urldecode($parts[1]);

                if (! in_array($key, ['brand', 'sort', 'page'])) {
                    $values[] = $value;
                }
            }
        }

        return array_unique($values);
    }
}
