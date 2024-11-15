<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Manufacturer;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Manufacture\ManufactureRepositoryInterface;

class ManufacturerItemViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(public Manufacturer $manufacturer)
    {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }
}
