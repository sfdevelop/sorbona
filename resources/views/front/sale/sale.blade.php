@extends('layout.okplius')
@section('content')
    <section class="more-offers more-offers--sale">
        <div class="container">
            <h3 class="title">{{__('front.menu.sale')}}</h3>

            <div class="breadcrumbs">
                <div class="breadcrumbs__inner">
                    <ul class="breadcrumbs__list">
                        <li> <a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                        <li> <span>{{__('front.menu.sale')}}</span></li>
                    </ul>
                </div>
            </div>

            <div class="list-items">
                @foreach($saleProducts as $saleProduct)
                    @php /** @var \App\Models\Product $@saleProduct */ @endphp

                    @include('layout.front.product._product', ['product' => $saleProduct])

                @endforeach
            </div>

            {{ $saleProducts->onEachSide(2)->appends($_GET)->links('pagination::plius') }}

        </div>
    </section>

    @livewire('front.subscribe.subscribe-live-wier')
@endsection