<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Manufacturer;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Manufacture\ManufactureRepositoryInterface;

class ManufacturersViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct()
    {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

    public function manufacturers()
    {
        return app()
            ->make(ManufactureRepositoryInterface::class)
            ->getAllManufacturersFromFront();
    }
}
