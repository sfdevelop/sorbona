@section('title', $title)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">
                        {{__('admin.option')}}
                    </h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
{{--                        {{ Breadcrumbs::render('setting') }}--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-50">
            <div class="row justify-content-center">
                <div class="col-sm-11 col-10">
                    <div class="mt-40 mb-50">
                        <form
                            action="{{ route('admin.setting.update')}}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('put')


                            <div class="edit-profile__body">

                                @include('admin.settings.partials.formSetting')

                                <x-button :message="__('admin.save')"/>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
