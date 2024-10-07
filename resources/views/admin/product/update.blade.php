@section('title', $title)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">{{__('admin.update')}}</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
{{--                        {{ Breadcrumbs::render('___________', $item) }}--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-50">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-10">
                    <div class="mt-40 mb-50">

                        <div class="edit-profile__body">
                            <div class="dm-tab tab-horizontal">
                                <ul class="nav nav-tabs vertical-tabs" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-v-1-tab" data-bs-toggle="tab" href="#tab-v-1"
                                           role="tab" aria-selected="true">{{__('admin.our')}}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-v-2-tab" data-bs-toggle="tab" href="#tab-v-2"
                                           role="tab" aria-selected="true">{{__('admin.additional_photo')}}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-v-3-tab" data-bs-toggle="tab" href="#tab-v-3"
                                           role="tab" aria-selected="true">{{__('admin.add_color')}}</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tab-v-1" role="tabpanel"
                                     aria-labelledby="tab-v-1-tab">
                                    <form
                                            action="{{ route('admin.product.update', $item->id )}}"
                                            method="POST"
                                            enctype="multipart/form-data"
                                    >
                                        @csrf
                                        @method('put')


                                        <div class="edit-profile__body">

                                            @include('admin.product.partials.formProduct')

                                            <x-button :message="__('admin.save')"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade  show" id="tab-v-2" role="tabpanel"
                                     aria-labelledby="tab-v-2-tab">
                                    @livewire('admin.additional-photo-live-wier',['product'=>$item])
                                </div>

                                <div class="tab-pane fade  show" id="tab-v-3" role="tabpanel"
                                     aria-labelledby="tab-v-3-tab">
                                    @livewire('admin.add-colors-to-product-live-wier',['product'=>$item])
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
