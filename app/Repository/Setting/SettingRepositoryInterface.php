<?php

namespace App\Repository\Setting;

use App\Models\Setting;

interface SettingRepositoryInterface
{
    public function getSetting(): Setting;
}
