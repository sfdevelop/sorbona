<section class="d-excellence">
    <div class="container">
        <h3 class="title element-animation">
            {{__('front.our_offers')}}
        </h3>
        <ul class="d-excellence__list">
            @foreach($offers as $offer)
                @php /** @var \App\Models\Offer $offer */ @endphp
            <li class="element-animation">
                <div class="d-excellence__list-top">
                    <img src="{{$offer->img_original}}" alt="icon-offer-{{$offer->title}}">
                    <h6>{{$offer->title}}</h6>
                </div>
                <p>
                    {{$offer->description}}
                </p>
            </li>
            @endforeach
        </ul>
    </div>
</section>