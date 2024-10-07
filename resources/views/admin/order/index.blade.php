@section('title', $title)
@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">
                        <span class="mx-10"> Замовлення</span>
                        {{--                        <x-create model="_________"/>--}}
                    </h4>

                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        {{--                        {{ Breadcrumbs::render('__________') }}--}}
                    </div>

                </div>
            </div>
        </div>

        <div class="row mb-50">
            <div class="col-12">

                <div class="card">
                    <div class="card-header color-dark fw-500">
                        Замовлення
                    </div>
                    <div class="card-body p-0">
                        <div class="table4 p-25 mb-30">
                            <div class="table-responsive">
                                <table class="table mb-0 table-custom">
                                    <thead>
                                    <tr class="userDatatable-header">
                                        <th style="width: 40px">
                                            <span class="userDatatable-title">id</span>
                                        </th>
                                        <th >
                                            <span class="userDatatable-title">{{__('admin.title')}}</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Статус</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Доставка/Оплата</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Сума:</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title"></span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        @php /** @var \App\Models\Order $item */@endphp
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{$item->id}}
                                                </div>
                                            </td>

                                            <td style="min-width: 20%">
                                                <div class="userDatatable-content">
                                                    Заказ № {{$item->id}} <br>
                                                     {{$item->name}}
                                                    <br>
                                                    <small
                                                        class="text-primary">{{$item->email}}</small> <br>
                                                    <small
                                                        class="text-success">{{$item->phone}}</small>
                                                    <br>
                                                    <small
                                                        class="text-gray">{{$item->created_at->format('d-m-Y H:i')}}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{getClassAndTitleStatusOrderFromAdmin($item->statusOrder)}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="userDatatable-content">
                                                    Доставка: {{$item->deliveryTitle}}
                                                    <br>
                                                    Оплата: <span class="text-success">{{translatePayment($item->payment)}}</span>
                                                    <br>
                                                    Статус оплати: <span class="text-primary">{{$item->statusPay}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{Number::currency($item->total, in:'EUR', locale: 'lt') }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="table-actions">
                                                    {{--                                                    <x-edit-in-table model="order" :id="$item->id"/>--}}
                                                    <a href="{{route('admin.order.show', $item->id)}}"> see</a>
                                                    <x-delete-in-table model="order" :id="$item->id"/>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $items->onEachSide(2)->links('pagination::default') }}
                </div>
            </div>
        </div>
    </div>
@endsection

