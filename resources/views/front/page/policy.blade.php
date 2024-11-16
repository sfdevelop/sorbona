@extends('layout.sorbona')
@section('content')
    <div class="breadcrumb__container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('front.menu.main')}}</a></li>
            <span>/</span>
            <li>{{__('front.policy')}}</li>
        </ul>
    </div>

    <section class="section">
        <div class="section__container section__container_pb">
            <div class="section__head">
                <h1 class="section-head__title">{{$policy->title}}</h1>
            </div>
            <article>
             {!! $policy->description !!}
            </article>
        </div>
    </section>
@endsection