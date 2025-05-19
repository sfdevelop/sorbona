<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\ViewModels\CartThxViewModel;

class CartThxController extends Controller
{
    public function __construct() {}

    public function __invoke(): CartThxViewModel
    {
        return (new CartThxViewModel)->view('front.cart-thx');
    }
}
