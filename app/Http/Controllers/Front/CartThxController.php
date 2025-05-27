<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\ViewModels\CartThxViewModel;
use App\Models\Order;

class CartThxController extends Controller
{
    public function __invoke(Order $order): CartThxViewModel
    {
        $order->load('orderItems');
//        dd($order);
        return (new CartThxViewModel($order))->view('front.cart-thx');
    }
}
