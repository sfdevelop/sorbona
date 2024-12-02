<?php

namespace App\Http\Controllers\Front;

use App\Repository\Page\PageRepositoryInterface;
use App\ViewModels\PageViewModel;

class ReturnController extends BaseFrontController
{
    public function __construct() {}

    public function __invoke()
    {
        $policy = app()
            ->make(PageRepositoryInterface::class)
            ->getPageFromId(2);

        return (new PageViewModel())
            ->view('front.page.policy', compact('policy'));
    }
}
