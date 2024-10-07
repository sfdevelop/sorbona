@section('title', $title)
@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">
                        <span class="mx-10"> Коментарі</span>
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
                        Коментарі
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
                                        <th style="width: 40px">
                                            <span class="userDatatable-title">Публікація</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Им'я</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Текст</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title"></span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        @php /** @var \App\Models\Comment $item */ @endphp
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{$item->id}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    @livewire('admin.comments.is-public-live-wier',['comment'=>$item])
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">

                                                    {{$item->name}} <br>
                                                    <small>{{$item->createdHuman}}</small>
                                                </div>
                                            </td>
                                            <td style="max-width: 700px">
                                                <div class="text-small">
                                                    {{$item->text}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-actions">
                                                    {{--                                                    <a target="_blank"--}}
                                                    {{--                                                       href="{{route('admin.product.edit', $item->product_id)}}"--}}
                                                    {{--                                                       style="font-size: 18px; color: orangered"><i--}}
                                                    {{--                                                            class="las la-eye"></i></a>--}}
                                                    <x-delete-in-table model="comment" :id="$item->id"/>
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

