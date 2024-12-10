@extends('layout.sorbona')
@section('content')
    @php /** @var \App\Models\Manufacturer $manufacturer */ @endphp
    <div class="breadcrumb__container">
        <ul class="breadcrumb">
            <li><a href="{{route('manufacturers')}}">{{__('front.manufacturers')}}</a></li>
            <span>/</span>
            <li>{{$manufacturer->title}}</li>
        </ul>
    </div>
    <section class="section">
        <div class="section__container section__container_pb">
            <div class="manufacturers">
                <div class="manufacturers__body">
                    <h1 class="manufacturers__title">{{__('front.manufacturer')}} {{$manufacturer->title}}</h1>
                    <article class="manufacturers__content">
                        {!! $manufacturer->description !!}
                    </article>
                    <sidebar class="manufacturers__sidebar">
                        <div class="manufacturers-sidebar__logo">
                            <img src="{{$manufacturer->img_jpg}}" alt="image" loading="lazy" class="img-full">
                        </div>
                        <div class="manufacturers-sidebar__item">
                            <p class="manufacturers-sidebar-item__text">{{__('front.all_name')}}</p>
                            <h4 class="manufacturers-sidebar-item__title">{{$manufacturer->all_title}} </h4>
                        </div>
                        <div class="manufacturers-sidebar__item">
                            <p class="manufacturers-sidebar-item__text">{{__('front.year_start')}}</p>
                            <h4 class="manufacturers-sidebar-item__title">{{$manufacturer->year}}</h4>
                        </div>
                        <div class="manufacturers-sidebar__item">
                            <p class="manufacturers-sidebar-item__text">{{__('front.specialization')}}</p>
                            <h4 class="manufacturers-sidebar-item__title">{{$manufacturer->specialization}}</h4>
                        </div>
                        <div class="manufacturers-sidebar__item">
                            <p class="manufacturers-sidebar-item__text">{{__('front.shtab_flat')}}</p>
                            <h4 class="manufacturers-sidebar-item__title">{{$manufacturer->flat}}</h4>
                        </div>
                    </sidebar>
                </div>
            </div>
        </div>
    </section>
@endsection