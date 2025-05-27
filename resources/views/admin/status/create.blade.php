@section('title', $title)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">{{__('admin.create')}}</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
{{--                        {{ Breadcrumbs::render('__________') }}--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-50">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-10">
                    <div class="mt-40 mb-50">
                        <form
                                action="{{ route('admin.status.store' )}}"
                                method="POST"
                                enctype="multipart/form-data"
                        >
                            @csrf


                            <div class="edit-profile__body">

                                @include('admin.status.partials.formStatus')

                                <x-button :message="__('admin.save')"/>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
