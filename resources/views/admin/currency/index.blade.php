@section('title', $title)
@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">
                        <span class="mx-10"> {{__('admin.currency')}}</span>
                        <x-create model="currency"/>
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
                        {{__('admin.currency')}}
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
                                        <th>
                                            <span class="userDatatable-title">{{__('admin.title')}}</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">{{__('admin.value')}}</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title"></span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{$item->id}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{$item->title}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{$item->currency}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-actions">
                                                    @if($item->title !== 'UAH')
                                                        <x-edit-in-table model="currency" :id="$item->id"/>

                                                        <x-delete-in-table model="currency" :id="$item->id"/>
                                                    @endif
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

