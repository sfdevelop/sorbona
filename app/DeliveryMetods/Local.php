<?php

namespace App\DeliveryMetods;

use App\Repository\Setting\SettingRepository;

class Local implements DeliveryMethodInterface
{

    final protected function getSetting()
    {
        return app()
            ->make(SettingRepository::class)
            ->getSetting();
    }

    public function isValid(): bool
    {
        return ! empty($this->getSetting());
    }

    public function getDeliveryData(): array
    {
        $setting = $this->getSetting();

        return [
            'region'  => '',
            'city'    => '',
            'address' => $setting->default_address,
        ];
    }
}
