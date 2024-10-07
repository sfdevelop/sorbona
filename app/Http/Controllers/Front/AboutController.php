<?php

namespace App\Http\Controllers\Front;

use App\Repository\Offer\OfferRepositoryInterface;
use App\Repository\Page\PageRepositoryInterface;
use App\Repository\Values\ValuesRepositoryInterface;
use App\Repository\WhyChooce\WhyChoiceRepositoryInterface;
use App\ViewModels\AboutViewModel;

class AboutController extends BaseFrontController
{
    public function __construct(
        public PageRepositoryInterface $pageRepository,
        public ValuesRepositoryInterface $valuesRepository,
        public OfferRepositoryInterface $offerRepository,
        public WhyChoiceRepositoryInterface $whyChoiceRepository,
    ) {}

    /**
     * @return AboutViewModel
     */
    public function __invoke(): AboutViewModel
    {
        return (new AboutViewModel(
            $this->pageRepository,
            $this->valuesRepository,
            $this->offerRepository,
            $this->whyChoiceRepository,
        ))->view('front.about.about');
    }
}
