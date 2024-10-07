@extends('layout.okplius')
@section('content')
    <section class="more-offers more-offers--sale">
        <div class="container">
            <h3 class="title">{{__('front.menu.bestsellers')}}</h3>

            <div class="breadcrumbs">
                <div class="breadcrumbs__inner">
                    <ul class="breadcrumbs__list">
                        <li> <a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                        <li> <span>{{__('front.menu.bestsellers')}}</span></li>
                    </ul>
                </div>
            </div>

            <div class="list-items">
                @foreach($bestsellerProducts as $bestsellerProduct)
                    @php /** @var \App\Models\Product $bestsellerProduct */ @endphp

                    @include('layout.front.product._product', ['product' => $bestsellerProduct])

                @endforeach
            </div>

            {{ $bestsellerProducts->onEachSide(2)->appends($_GET)->links('pagination::plius') }}

        </div>
    </section>

    @livewire('front.subscribe.subscribe-live-wier')
@endsection