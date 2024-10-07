@section('title', $title)
@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">
                        {{__('admin.profile')}}
                    </h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        {{--                        {{ Breadcrumbs::render('deviceUpdate') }}--}}
                    </div>
                </div>
            </div>
        </div>

        <form
            action="{{ route('admin.profile.update')}}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('put')


            <div class="edit-profile__body">

                @include('admin.profile.partials.formUser')

                @include('layout.admin.save')

            </div>
        </form>
    </div>

@endsection
