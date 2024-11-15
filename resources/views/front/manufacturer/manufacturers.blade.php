@extends('layout.sorbona')
@section('content')
    <section class="section">
        <div class="section__container section__container_p">
            <div class="section__head">
                <h1 class="section__title">{{__('front.manufacturers')}}</h1>
            </div>
            <div class="manufacturers">
                <div class="manufacturers__list">

                    @foreach($manufacturers as $manufacturer)
                        @php /** @var \App\Models\Manufacturer $manufacturer */ @endphp
                        <a href="{{route('manufacturerItem', $manufacturer->slug)}}" class="manufacturers__item">
                            <div class="manufacturers-item__logo">
                                <img src="{{$manufacturer->img_web}}" alt="image" loading="lazy" class="img-full" />
                            </div>
                            <h5  style="text-align: center" class="manufacturers-item__title">{{$manufacturer->title}}</h5>
                        </a>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
@endsection