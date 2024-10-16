@section('title', 'Start')
@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title d-flex align-items-center">
                        <span class="mx-10"> START</span>
                    </h4>

                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        {{--                        {{ Breadcrumbs::render('slider') }}--}}
                    </div>
                </div>
            </div>
        </div>


        <div class="card card-default card-md mb-4 accordion__custom">
            <div class="card-header py-20">
                <h6>Наши советы</h6>
            </div>
            <div class="card-body">
                <p>
                    В этом разделе мы будем давать советы по работе админкой. Задавайте вопросы по потребностям, мы будем
                    на них отвечать.
                </p>
            </div>
            <div class="card-body">
                <div class="dm-collapse dm-accordion">
                    @include('admin.start.partials.all')
                    @include('admin.start.partials.photo')
                    @include('admin.start.partials.notify')
                </div>
            </div>
        </div>
    </div>

@endsection
