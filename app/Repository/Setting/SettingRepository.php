<?php

namespace App\Repository\Setting;

use App\Models\Setting;

class SettingRepository implements SettingRepositoryInterface
{
    public function getSetting(): Setting
    {
        return Setting::query()->trans()->first();
    }
}
