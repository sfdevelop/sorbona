@extends('layout.bureviy')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner ">
                <ul class="breadcrumbs__list">
                    <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                    <li><span>Profile</span></li>
                </ul>
            </div>
        </div>

        <section class="cabinet">
            <div class="container">
                <h3 class="title ">
                    {{__('front.profile')}}
                </h3>
                <div class="cabinet__inner">

                    <x-cabinet.info/>

                    @livewire('front.cabinet.info-live-wier')
                </div>
            </div>
        </section>
    </div>
@endsection