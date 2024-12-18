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

        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.product.index')}}">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <x-input
                                    with="25"
                                    type="text"
                                    title="{{__('admin.title')}}"
                                    name="title"
                                    :item="request()"
                            />
                        </div>

                        <div class="col-12 col-lg-4">
                            <x-input
                                    with="25"
                                    type="text"
                                    title="{{__('admin.sku')}}"
                                    name="sku"
                                    :item="request()"
                            />
                        </div>
                    </div>
                    <div class="d-flex">
                        <button
                                type="submit"
                                class="btn btn-sm btn-primary"
                        >
                            {{__('admin.search')}}
                        </button>

                        <a
                                style="margin-left: 10px;"
                                href="{{route('admin.product.index')}}"
                                class="btn btn-sm btn-warning ml-4"
                        >
                            {{__('admin.clear')}}
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb-50">
            <div class="col-12">
                <form
                        method="POST"
                        action="{{route('admin.product.delete')}}"
                >
                    <div class="card">
                        <div class="d-flex justify-content-between">
                            <div class="card-header color-dark fw-500">
                                {{__('admin.product')}}
                            </div>
                            <div class="card-header color-dark fw-500">
                                <button class="btn btn-sm btn-info-hover" type="submit">{{__('admin.delete')}}</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table4 p-25 mb-30">
                                <div class="table-responsive">

                                    @csrf
                                    <table class="table mb-0 table-custom">
                                        <thead>
                                        <tr class="userDatatable-header">

                                            <th style="width: 40px">
                                                <span class="userDatatable-title">id</span>
                                            </th>
                                            <th style="width: 110px">
                                                {{--                                            <span class="userDatatable-title">{{__('admin.title')}}</span>--}}
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
                                                <span class="userDatatable-title">{{__('admin.currency')}}</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">{{__('admin.sale_text')}}</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">{{__('admin.sort')}}</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title"></span>
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
                                                <td style="width: 50px; font-size: 12px">
                                                    @if($item->is_public)
                                                        <small class="bg-opacity-primary  color-primary px-2 radius mb-3">public</small>
                                                    @else
                                                        <small class="bg-opacity-gray  color-gray px-2 radius mb-3">No
                                                            public</small>
                                                    @endif
                                                </td>
                                                <td>
                                                <span class="author-info">
                                                    <img
                                                            style="max-width: 60px; border-radius: 10px; box-shadow:  0 0 8px rgba(0, 0, 0, 0.1);"
                                                            src="{{$item->preview}}"
                                                            alt="admin author">
                                                </span>
                                                </td>

                                                <td>
                                                    <div class="userDatatable-content">
                                                        <small class="text-gray">{{__('admin.sku')}}
                                                            : {{$item->sku}}</small><br>
                                                        <small class="text-gray">{{__('admin.category')}}
                                                            : {{$item->category->title}}</small><br>
                                                        <a href="{{route('admin.product.edit', $item->id)}}">
                                                            {{$item->title}}
                                                        </a>
                                                        <br>
                                                        @if($item->is_new)
                                                            <span class="bg-opacity-success  color-success px-2 radius mb-3">New</span>
                                                        @endif
                                                        @if($item->is_top)
                                                            <span class="bg-opacity-warning  color-warning px-2 radius mt-2">Top</span>
                                                        @endif

                                                        @if($item->sale)
                                                            <span class="bg-opacity-danger  color-danger px-2 radius mt-2">Sale</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        <small class="text-success">Ціна: {{$item->now_price}} ₴</small>
                                                        <br>
                                                        <small class="text-primary">Ціна від {{$item->qtyMilkoopt}}
                                                            : {{$item->price_from_ten}} ₴</small>
                                                        <br>
                                                        <small class="text-warning">Ціна від {{$item->qtyOpt}}
                                                            : {{$item->price_from_twenty}} ₴</small>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{$item->currency->title}}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="userDatatable-content" style="margin-bottom: 10px;">
                                                        @if($item->sale)
                                                            {{Number::percentage($item->sale)}}
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

                                                <td>
                                                    <div class="userDatatable-content">
                                                        <input
                                                                type="checkbox"
                                                                name="product_ids[]"
                                                                id=""
                                                                value="{{$item->id}}"
                                                        >
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        {{ $items->onEachSide(2)->appends($_GET)->links('pagination::default') }}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

