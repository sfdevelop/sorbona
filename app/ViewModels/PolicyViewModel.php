<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Page;
use App\Repository\Benefits\BenefitRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PolicyViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(public Page $policy) {}

    public function benefits(): Collection
    {
        return app()
            ->make(BenefitRepositoryInterface::class)
            ->getAllBenefits();
    }
}
