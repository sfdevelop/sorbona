<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Page;
use App\Repository\Benefits\BenefitRepositoryInterface;
use App\Repository\Manufacture\ManufactureRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AboutViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(public Page $about) {}

    public function benefits(): Collection
    {
        return app()
            ->make(BenefitRepositoryInterface::class)
            ->getAllBenefits();
    }

    public function aboutManufacturers()
    {
        return app()
            ->make(ManufactureRepositoryInterface::class)
            ->getManufacturersOnPage(10);
    }
}
