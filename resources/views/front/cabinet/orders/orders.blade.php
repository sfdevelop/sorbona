@extends('layout.bureviy')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner ">
                <ul class="breadcrumbs__list">
                    <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                    <li><span>{{__("front.orders")}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="cabinet">
        <div class="container">
            <h3 class="title">
                Orders
            </h3>
            <div class="cabinet__inner">
                <x-cabinet.info/>
                <div class="cabinet__right">
                    <div class="cabinet__btn element-animation">
                        <img src="{{asset('front/images/dest/icons/menu.svg')}}" alt="icon">
                        {{__('front.Menu')}}
                    </div>
                    <h4 class="element-animation">
                        {{__('front.orders')}}
                    </h4>
                    <div class="cabinet__order-wrapp">
                        <div class="cabinet__order-wrap">
                            <div class="cabinet__order-top element-animation">
                                <div class="cabinet__order-col">
                                    # {{__('order')}}
                                </div>
                                <div class="cabinet__order-col">
                                    {{__('front.date')}}
                                </div>
                                <div class="cabinet__order-col">
                                    {{__('front.total')}}
                                </div>
                                <div class="cabinet__order-col">
                                    {{__('front.status')}}
                                </div>
                                <div class="cabinet__order-col">

                                </div>
                            </div>

                            @foreach($orders as $order)
                                @php /** @var \App\Models\Order $order */ @endphp

                                <div class="cabinet__order element-animation">
                                    <div class="cabinet__order-col">
                                        # {{$order->id}}
                                    </div>
                                    <div class="cabinet__order-col">
                                        {{$order->created_format}}
                                    </div>
                                    <div class="cabinet__order-col">
                                        {{currencyUAH($order->total) }}
                                    </div>
                                    <div class="cabinet__order-col">
                                        {!! getClassAndTitleStatusOrder($order->statusOrder) !!}
                                    </div>
                                    <div class="cabinet__order-col">
                                        <a href="{{route('order', $order->id)}}">{{__('front.view')}}</a>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                    {{ $orders->onEachSide(2)->appends($_GET)->links('pagination::bureviy') }}
                </div>
            </div>
        </div>
    </section>
@endsection