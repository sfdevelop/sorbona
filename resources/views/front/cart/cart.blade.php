@extends('layout.bureviy')
@section('content')

    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner element-animation">
                <ul class="breadcrumbs__list">
                    <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                    <li><span>{{__('front.cart')}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="cart">
        <div class="container">
            <h3 class="title element-animation">
                {{__('front.cart')}}
            </h3>
            <div class="cart__inner">

                @livewire('front.cart.create-order-live-wier')
                @livewire('front.cart.bascket-right-live-wier')

            </div>
        </div>
    </section>

@endsection