<?php

namespace App\ViewModels;

class CabinetWishlistViewModel extends BaseViewModel
{
    public function __construct(

    ) {}

    public function wishlists()
    {
        return \Auth::user()->wishlist;
    }

    /**
     * @return array|mixed
     */
    public function wishlistOnAuthUser(): mixed
    {
        if (! \Auth::check()) {
            return [];
        }

        return \Auth::user()->wishlist_ids;
    }
}
