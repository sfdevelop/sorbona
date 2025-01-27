<?php

namespace App\Http\Controllers\Front;

use App\Repository\Page\PageRepositoryInterface;
use App\ViewModels\PolicyViewModel;

class PolicyController extends BaseFrontController
{
    public function __construct(
    ) {}

    public function __invoke()
    {
        $policy = app()
            ->make(PageRepositoryInterface::class)
            ->getPageFromId(1);

        return (new PolicyViewModel($policy))->view('front.page.policy');
    }
}
