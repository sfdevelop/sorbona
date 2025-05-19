<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repository\Product\ProductRepositoryInterface;
use App\ViewModels\SearchViewModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(
        public ProductRepositoryInterface $productRepository
    ) {}

    public function __invoke(Request $request)
    {
        $search = request('search');

        return (new SearchViewModel($search, $request, $this->productRepository))->view('front.search.search');
    }
}
