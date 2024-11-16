<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Repository\Page\PageRepositoryInterface;
use App\ViewModels\ArticleViewModel;

class ReturnController extends BaseFrontController
{
    public function __construct(
    ) {}


    public function __invoke()
    {
        $policy = app()
            ->make(PageRepositoryInterface::class)
            ->getPageFromId(2);

        return view('front.page.policy', compact('policy'));
    }
}
