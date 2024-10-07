@extends('layout.bureviy')
@section('content')
    @php /** @var \App\Models\Order $order */ @endphp
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner ">
                <ul class="breadcrumbs__list">
                    <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                    <li><a href="{{route('orders')}}">{{__("front.orders")}}</a></li>
                    <li><span>{{__('front.orders')}} #{{$order->id}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="cabinet">
        <div class="container">
            <h3 class="title">
                {{__('front.orders')}} #{{$order->id}}
            </h3>
            <div class="cabinet__inner">

                <x-cabinet.info/>

                <div class="cabinet__right">
                    <div class="cabinet__btn">
                        <img src="{{asset('front/images/dest/icons/menu.svg')}}" alt="icon">
                        Меню
                    </div>
                    <div class="cabinet__info-wrapp">
                        <div class="cabinet__info-wrap">
                            <div class="cabinet__detail-top element-animation">
                                <a href="{{ url()->previous() }}">
                                    <img src="{{asset('front/images/dest/icons/arrow-slider-dark.svg')}}" alt="arrow">
                                    {{__('front.orders')}} #{{$order->id}}
                                </a>
                                <div>
                                    {!! getClassAndTitleStatusOrder($order->statusOrder) !!}
                                    <p>{{$order->created_format}}</p>
                                </div>
                            </div>
                            @foreach($order->orderItems as $item)
                                @php /** @var \App\Models\OrderItem $item */ @endphp
                                <div class="cabinet__info element-animation">
                                    <div class="cabinet__info-box">
                                        <h3>
                                            {{$item->title}}
                                        </h3>
                                        @if($item->size)
                                            <div class="cabinet__info-size">
                                                {{__('front.size')}}: <span>{{$item->size}}</span>
                                            </div>
                                        @endif
                                        @if($item->color)
                                            <div class="cabinet__info-color">
                                                {{__('front.color')}}: <span>{{$item->color}}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="cabinet__info-col">{{$item->qty}}</div>
                                    <div class="cabinet__info-col">{{currencyUAH($item->price_all)}}</div>
                                </div>
                            @endforeach

                            <div class="cabinet__info-total element-animation">
                                {{currencyUAH($order->total)}}
                            </div>
                        </div>
                    </div>
                    <h6 class="element-animation">
                        {{__('front.deliveryDetail')}}
                    </h6>
                    @if($order->payment == 'LiqPay')
                        <div class="cabinet__payment element-animation">
                            {{__('front.payment')}}: <span>{{$order->payment}}</span> / <span
                                    class="active">{{translatePaymentPaid($order->statusPay)}}</span>
                        </div>
                    @else
                        <div class="cabinet__payment element-animation">
                            {{__('front.payment')}}: <span>{{ translatePayment($order->payment) }}</span>
                        </div>
                    @endif
                    <div class="cabinet__adress element-animation">
                        <div class="cabinet__adress-col">
                            {{__('front.city')}}: <span>{{$order->delivery['city']}}</span>
                        </div>
                        <div class="cabinet__adress-col">
                            {{__('front.region')}}: <span>{{$order->delivery['region']}}</span>
                        </div>
                        <div class="cabinet__adress-col">
                            {{__('front.department')}}:
                            <div>
                                <span>{{$order->delivery['address']}}</span>

                            </div>
                        </div>
                    </div>
                    {{--                    <button class="btn btn--transparent2 element-animation">--}}
                    {{--                        Cancel order--}}
                    {{--                        <img src="{{asset('front/images/dest/icons/arrow-btn2.svg')}}" alt="decor">--}}
                    {{--                    </button>--}}
                </div>
            </div>
        </div>
    </section>

@endsection