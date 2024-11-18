<?php

namespace App\Http\Controllers\Front;

use App\Models\Manufacturer;
use App\ViewModels\ManufacturerItemViewModel;

class ManufacturerItemController extends BaseFrontController
{
    public function __construct(
    ) {}

    public function __invoke(Manufacturer $manufacturer)
    {
        return (new ManufacturerItemViewModel($manufacturer))->view('front.manufacturer.manufacturer');
    }
}
