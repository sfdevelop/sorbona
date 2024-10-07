<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Repository\Offer\OfferRepositoryInterface;
use App\Repository\Page\PageRepositoryInterface;
use App\Repository\Values\ValuesRepositoryInterface;
use App\Repository\WhyChooce\WhyChoiceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AboutViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
        protected PageRepositoryInterface $pageRepository,
        protected ValuesRepositoryInterface $valuesRepository,
        protected OfferRepositoryInterface $offerRepository,
        protected WhyChoiceRepositoryInterface $whyChoiceRepository,
    ) {}

    /**
     * @return \App\Models\Page
     */
    public function about(): \App\Models\Page
    {
        $result = $this->pageRepository->getPageFromId(2);
        $this->setSeoData($result);

        return $result;
    }

    /**
     * @return Collection|null
     */
    public function values(): ?Collection
    {
        return $this->valuesRepository->getAllValues();
    }

    /**
     * @return Collection|null
     */
    public function offers(): ?Collection
    {
        return $this->offerRepository->getAllOffers();
    }

    /**
     * @return Collection|null
     */
    public function whyChoices(): ?Collection
    {
        return $this->whyChoiceRepository->getAllWyChoice();
    }
}
