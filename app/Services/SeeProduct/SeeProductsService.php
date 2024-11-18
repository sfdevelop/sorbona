<?php

namespace App\Services\SeeProduct;

use Session;

class SeeProductsService
{
    public function updateRecentlyViewedProducts(int $productId): void
    {
        $recentlyViewed = Session::get('recently_viewed', []);

        if (($key = array_search($productId, $recentlyViewed)) !== false) {
            unset($recentlyViewed[$key]);
        }

        $recentlyViewed[] = $productId;

        if (count($recentlyViewed) > 25) {
            array_shift($recentlyViewed);
        }

        Session::put('recently_viewed', $recentlyViewed);
    }
}