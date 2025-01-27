<?php

namespace App\Http\Controllers\Front;

use App\Repository\Page\PageRepositoryInterface;
use App\ViewModels\AboutViewModel;

class AboutController extends BaseFrontController
{
    public function __construct() {}

    /**
     * @return AboutViewModel
     */

    public function __invoke(): AboutViewModel
    {
        $about = app()
            ->make(PageRepositoryInterface::class)
            ->getPageFromId(4);

        return (new AboutViewModel($about))->view('front.about.about');
    }
}
