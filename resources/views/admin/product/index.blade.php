@section('title', $title)
@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">
                        <span class="mx-10"> {{__('admin.product')}}</span>
                        <x-create model="product"/>
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
                        {{__('admin.product')}}
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
                                        <th style="width: 100px">
                                            <span class="userDatatable-title">{{__('admin.image')}}</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">{{__('admin.title')}}</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">{{__('admin.price')}}</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">{{__('admin.stickers')}}</span>
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
                                        @php /** @var \App\Models\Product $item */ @endphp
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{$item->id}}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="author-info">
                                                    <img
                                                            style="max-width: 60px"
                                                            src="{{$item->preview}}"
                                                            alt="admin author">
                                                </span>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{$item->title}} <br>
                                                    @foreach($item->categories as $category)
                                                        <small class="text-white px-1 bg-warning radius">{{$category->title}}</small>
                                                        <br>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    <small class="text-success">{{$item->now_price}}</small>
                                                    <br>
                                                    <small class="text-gray text-decoration-line-through">{{$item->old_price}}</small>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="userDatatable-content">
                                                    @if($item->is_new)
                                                        <span class="bg-opacity-success  color-success px-2 radius ">New</span>
                                                    @endif

                                                    @if($item->is_bestseller)
                                                            <span class="bg-opacity-warning  color-warning px-2 radius mt-2">Bestseller</span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td>
                                                <div class="userDatatable-content">
                                                    {{$item->sort}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-actions">
                                                    <x-edit-in-table model="product" :id="$item->id"/>

                                                    <x-delete-in-table model="product" :id="$item->id"/>
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

