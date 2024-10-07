<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Slider\SliderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class HomepageViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
        protected SliderRepositoryInterface $sliderRepository,
        protected ProductRepositoryInterface $productRepository,
        protected CategoryRepositoryInterface $categoryRepository,
    ) {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

    /**
     * @return Collection
     */
    public function sliders(): Collection
    {
        return $this->sliderRepository->getAllSliders();
    }

    /**
     * @return array|Collection
     */
    public function bestsellers(): Collection|array
    {
        return $this->productRepository->getBestsellers();
    }

    public function homePageCategories(): Collection|array
    {
        return $this->categoryRepository->getCategoriesInMainPage();
    }

    public function newProducts(): Collection|array
    {
        return $this->productRepository->getNewProducts();
    }
}
