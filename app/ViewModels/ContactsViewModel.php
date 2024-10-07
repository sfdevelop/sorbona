<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Repository\Setting\SettingRepositoryInterface;

class ContactsViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
        protected SettingRepositoryInterface $settingsRepository,
    ) {
        $this->setSeoData($this->settingsRepository->getSetting());
    }
}
