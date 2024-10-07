@section('title', $title)
@extends('layout.app')
@section('content')
    @php /** @var \App\Models\Order $order */ @endphp
    <div class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="payment-invoice global-shadow radius-xl w-100 mb-30">
                        <div class="payment-invoice__body">
                            <div class="payment-invoice-address d-flex justify-content-sm-between">
                                <div class="payment-invoice-logo">
                                    {{--                                    <a href="index.html">--}}
                                    {{--                                        <img class="dark" src="img/logo-dark.png" alt="logo">--}}
                                    {{--                                        <img class="light" src="img/logo-white.png" alt="logo">--}}
                                    {{--                                    </a>--}}
                                </div>
                                <div class="payment-invoice-address__area">
                                    <h5>Доставка: {{translateDelivery($order->deliveryTitle)}}</h5>


                                        <address>{{$order->delivery['region']}}
                                            <br> {{$order->delivery['city']}}
                                            <br> {{$order->delivery['address']}}
                                        </address>

                                </div>
                            </div><!-- End: .payment-invoice-address -->
                            <div
                                class="payment-invoice-qr d-flex justify-content-between mb-40 px-xl-50 px-30 py-sm-30 py-20 ">
                                <div class="d-flex justify-content-center mb-lg-0 mb-25">
                                    <div class="payment-invoice-qr__number">
                                        <div class="display-3">
                                            Замовлення
                                        </div>
                                        <p>No : <span>#{{$order->id}}</span></p>
                                        <p>Date : <span>{{$order->created_at->format('d.m.Y H:i')}}</span></p>
                                    </div>
                                </div><!-- End: .d-flex -->
                                <div class="d-flex justify-content-center mb-lg-0 mb-25">
                                    {{--                                    <div class="payment-invoice-qr__code bg-white radius-xl p-20">--}}
                                    {{--                                        <img src="img/qr.png" alt="qr">--}}
                                    {{--                                        <p>8364297359912267</p>--}}
                                    {{--                                    </div>--}}
                                </div><!-- End: .d-flex -->
                                <div class="d-flex justify-content-center">
                                    <div class="payment-invoice-qr__address">
                                        <p>Заказчик:</p>
                                        <span> {{$order->name}}</span><br>
                                        <span>{{$order->phone}}</span><br>
                                        <span>{{$order->email}}</span>
                                    </div>
                                </div><!-- End: .d-flex -->
                            </div><!-- End: .payment-invoice-qr -->
                            <div class="payment-invoice-table">
                                <div class="table-responsive">
                                    <table id="cart" class="table table-borderless">
                                        <thead>
                                        <tr class="product-cart__header">
                                            <th scope="col">#</th>
                                            <th scope="col">Товар</th>
                                            <th scope="col" class="text-end">Ціна за од.</th>
                                            <th scope="col" class="text-end">Кількість</th>
                                            <th scope="col" class="text-end">Сума</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->orderItems as $key=> $item)
                                            <tr>
                                                <th>{{$key + 1}}</th>
                                                <td class="Product-cart-title">
                                                    <div class="media  align-items-center">
                                                        <div class="media-body">
                                                            <h5 class="mt-0">{{$item->title}}</h5>
                                                            {{--                                                        <div class="d-flex">--}}
                                                            {{--                                                            <p>Size:<span>large</span></p>--}}
                                                            {{--                                                            <p>color:<span>brown</span></p>--}}

                                                            {{--                                                        </div>--}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="unit text-end">{{$item->price_item}} грн</td>
                                                <td class="invoice-quantity text-end">{{$item->qty}}</td>
                                                <td class="text-end order">{{$item->price_all}} грн</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="order-summery float-right border-0   ">
                                                <div class="total">
                                                    <div class="subtotalTotal mb-0 text-end">
                                                        Сума доставки :
                                                    </div>
                                                    {{--                                                    <div class="taxes mb-0 text-end">--}}
                                                    {{--                                                        discount :--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <div class="shipping mb-0 text-end">--}}
                                                    {{--                                                        Shipping charge :--}}
                                                    {{--                                                    </div>--}}
                                                </div>
                                                <div class="total-money mt-2 text-end">
                                                    <h6>До сплати :</h6>
                                                </div>
                                            </td>
                                            @php /** @var \App\Models\Order $order */ @endphp
                                            <td>
                                                <div class="total-order float-right text-end fs-14 fw-500">
                                                    <h5 class="text-primary">{{Number::currency($order->total, in:'EUR', locale: 'lt') }}</h5>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
{{--                                                                <div class="payment-invoice__btn mt-xxl-50 pt-xxl-30">--}}
{{--                                                                    <button type="button"--}}
{{--                                                                            class="btn border rounded-pill bg-normal text-gray px-25 print-btn">--}}
{{--                                                                        <img src="img/svg/printer.svg" alt="printer" class="svg">print--}}
{{--                                                                    </button>--}}
{{--                                                                    <button type="button" class="btn border rounded-pill bg-normal text-gray px-25">--}}
{{--                                                                        <img src="img/svg/send.svg" alt="send" class="svg">invoice--}}
{{--                                                                    </button>--}}
{{--                                                                    <button type="button"--}}
{{--                                                                            class="btn-primary btn rounded-pill px-25 text-white download">--}}
{{--                                                                        <img src="img/svg/upload.svg" alt="upload" class="svg">download--}}
{{--                                                                    </button>--}}
{{--                                                                </div>--}}
                            </div><!-- End: .payment-invoice-table -->
                                                        @livewire('order.change-status-live-wier', ['order' => $order])
                        </div><!-- End: .payment-invoice__body -->
                    </div><!-- End: .payment-invoice -->
                </div><!-- End: .col -->

            </div>
        </div>
    </div>
@endsection
