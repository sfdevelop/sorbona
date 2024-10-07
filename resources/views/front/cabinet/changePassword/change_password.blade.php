@extends('layout.bureviy')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__inner ">
                <ul class="breadcrumbs__list">
                    <li><a href="{{route('home')}}">{{__('front.menu.home')}}</a></li>
                    <li><span>{{__('front.change_password')}}</span></li>
                </ul>
            </div>
        </div>

        <section class="cabinet">
            <div class="container">
                <h3 class="title ">
                    {{__('front.change_password')}}
                </h3>
                <div class="cabinet__inner">

                    <x-cabinet.info/>
                    @livewire('front.cabinet.change-password-live-wier')
                </div>
            </div>
        </section>
    </div>
@endsection