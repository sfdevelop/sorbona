<?php

namespace App\Http\Controllers\Front;

use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Slider\SliderRepositoryInterface;
use App\ViewModels\HomepageViewModel;

class HomeController extends BaseFrontController
{
    public function __construct(
        public SliderRepositoryInterface $sliderRepository,
        public ProductRepositoryInterface $productRepository,
        public CategoryRepositoryInterface $categoryRepository,
    ) {}

    /**
     * @return HomepageViewModel
     */
    public function __invoke(): HomepageViewModel
    {
        return (new HomepageViewModel(
            $this->sliderRepository,
            $this->productRepository,
            $this->categoryRepository,
        ))->view('front.home.home');
    }
}
