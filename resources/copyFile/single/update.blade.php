@section('title', $title)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">
                        _____________________
                    </h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        {{ Breadcrumbs::render('_________________') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-50">
            <div class="row justify-content-center">
                <div class="col-sm-8 col-10">
                    <div class="mt-40 mb-50">
                        <form
                            action="{{ route('admin._________________.update')}}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('put')


                            <div class="edit-profile__body">

                                @include('________________.formSetting')

                                <x-button :message="__('admin.save')"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection