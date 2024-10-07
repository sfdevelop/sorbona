<?php

namespace App\Http\Controllers\Front\Cabinet;

use App\Http\Controllers\Front\BaseFrontController;
use App\ViewModels\CabinetWishlistViewModel;

class CabinetWishlistController extends BaseFrontController
{
    public function __construct() {}

    /**
     * @return CabinetWishlistViewModel
     */
    public function __invoke(): CabinetWishlistViewModel
    {
        return (new CabinetWishlistViewModel)->view('front.cabinet.wishlist.wishlist');
    }
}
