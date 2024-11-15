<?php

namespace App\Http\Controllers\Front;

use App\Models\Manufacturer;
use App\Repository\Category\CategoryRepositoryInterface;
use App\ViewModels\CatalogViewModel;
use App\ViewModels\ManufacturerItemViewModel;
use App\ViewModels\ManufacturersViewModel;

class ManufacturerItemController extends BaseFrontController
{
    public function __construct(
    ) {}


    public function __invoke(Manufacturer $manufacturer)
    {
        return (new ManufacturerItemViewModel($manufacturer))->view('front.manufacturer.manufacturer');
    }
}
