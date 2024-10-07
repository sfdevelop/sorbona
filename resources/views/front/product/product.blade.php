@extends('layout.bureviy')
@section('content')
    @php /** @var \App\Models\Product $product */ @endphp
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner element-animation">
                <ul class="breadcrumbs__list">
                    <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                    <li><a href="{{route('catalog')}}">{{__('front.menu.catalog')}}</a></li>
                    <li><a href="#">{{$product->category->title}}</a></li>
                    <li><span>{{$product->title}}</span></li>
                </ul>
            </div>
        </div>


        <section class="product">
            <div class="container">
                <div class="product__inner">

                    @include('front.product._photos_product')

                    @livewire('front.product.add-to-cart-live-wier',
                    [
                        'product' => $product,
                        'sizes' => $sizes,
                        'colors' => $colors,
                        'wishList' => $wishlistOnAuthUser
                    ]
                    )

                </div>
            </div>
        </section>

    </div>
    <section class="u-info">
        <div class="container">
            <div class="u-info__inner">
                <div class="u-info__left">
                    <h6 class="element-animation">
                        {{__('front.description')}}
                    </h6>
                    <div class="element-animation">
                        {!! $product->description !!}
                    </div>
                </div>
                @include('front.product._comments')
            </div>
        </div>
    </section>
@endsection