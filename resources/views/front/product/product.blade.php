@extends('layout.sorbona')
@section('content')
    @php /** @var \App\Models\Product $product */ @endphp
    <div class="breadcrumb__container--medium">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('front.menu.main')}}</a></li>
            @if ($product->category->parentCategory)
                <span>/</span>
                <li>
                    <a href="{{route('category', $product->category->parentCategory->slug)}}">{{$product->category->parentCategory->title}}</a>
                </li>
            @endif
            <span>/</span>
            <li><a href="{{route('category', $product->category->slug)}}">{{$product->category->title}}</a></li>
            <span>/</span>
            <li>{{$product->title}}</li>
        </ul>
    </div>

    <section class="section">
        <div class="section__container--medium section__container_pb">
            <div class="single__product">
                <div class="single__product_head">
                    <h1 class="single__product_title">{{$product->title}}</h1>
                    <p class="single__product_article">{{__('front.sku')}} {{$product->sku}}</p>
                </div>
                <div class="single__product_body">

                    @include('front.product._photo')

                    <div class="single__product_wrapper">
                        <div class="product-item__body">

                            @include('front.product.__manufacturer')
                            @livewire('front.product.product-live-wire', ['product' => $product])


                        </div>
                        @include('front.product._miniFilters')
                    </div>
                </div>
                <h3 class="single__product_info-title">{{__('front.characteristics')}}</h3>
                <div class="single__product_info">
                    @include('front.product._options')
                    <div class="single__product_info-col">

                        {!! $product->description  !!}

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('front.product._randomProducts')
    @include('front.product._seeProducts')

@endsection

@pushonce('frontJs')
    <script>
        $(document).ready(function () {
            $('.single__product_info-col p').each(function () {
                $(this).addClass('single__product_info-decription');
            });
        });
    </script>
@endpushonce
