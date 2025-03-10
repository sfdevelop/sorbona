@section('title', $title)
@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">
                        <span class="mx-10"> {{__('admin.category')}}</span>
                        <x-create model="category"/>
                    </h4>

                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        {{--                        {{ Breadcrumbs::render('__________') }}--}}
                    </div>

                </div>
            </div>
        </div>

        @include('admin.category._filterCategory')

        <div class="row mb-50">
            <div class="col-12">

                <div class="card">
                    <div class="card-header color-dark fw-500">
                        {{__('admin.category')}}
                    </div>
                    <div class="card-body p-0">
                        <div class="table4 p-25 mb-30">
                            <div class="table-responsive">
                                <table class="table mb-0 table-custom">
                                    <thead>
                                    <tr class="userDatatable-header">
                                        {{--                                        <th style="width: 40px">--}}
                                        {{--                                            <span class="userDatatable-title">id</span>--}}
                                        {{--                                        </th>--}}
                                        {{--                                        <th style="width: 100px">--}}
                                        {{--                                            <span class="userDatatable-title">{{__('admin.image')}}</span>--}}
                                        {{--                                        </th>--}}
                                        <th>
                                            <span class="userDatatable-title">{{__('admin.title')}}</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">{{__('admin.sort')}}</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title"></span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        @php /** @var \App\Models\Category $item */ @endphp
                                        <tr class="two_td">
                                            <td>
                                                <div class="userDatatable-content">
                                                    <a href="{{route('admin.category.edit', $item->id)}}">
                                                        {{$item->title}}
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{$item->sort}}
                                                </div>
                                            </td>
                                            @include('admin.category._action')
                                        </tr>

                                        @include('admin.category._category_two')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $items->onEachSide(2)->appends($_GET)->links('pagination::default') }}
                </div>
            </div>
        </div>
    </div>
@endsection

