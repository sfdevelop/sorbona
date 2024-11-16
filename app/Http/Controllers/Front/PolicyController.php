<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Repository\Page\PageRepositoryInterface;
use App\ViewModels\ArticleViewModel;

class PolicyController extends BaseFrontController
{
    public function __construct(
    ) {}


    public function __invoke()
    {
        $policy = app()
            ->make(PageRepositoryInterface::class)
            ->getPageFromId(1);

        return view('front.page.policy', compact('policy'));
    }
}
