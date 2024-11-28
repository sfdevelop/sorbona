<div class="single__product_content">
    @php /** @var \App\Models\Product $product */ @endphp
    <div class="single__product_content-item">
        <div class="single__product_info-item">
            <p>{{__('front.manufacturer')}}:</p>
            <h4>{{$product->manufacturer->title}}</h4>
        </div>
        @foreach($miniOptions as $optionmini)
            <div class="single__product_info-item">
                <p>{{$optionmini->filter->title}}</p>
                <h4>{{$optionmini->title}}</h4>
            </div>
        @endforeach

        <p class="single__product_content-text">
            {{$product->short_description}}
        </p>

    </div>
    <div class="single__product_content-title">
        <svg>
            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-track')}}"></use>
        </svg>
        <span>{{__('front.delivery')}}</span>
    </div>
    <div class="single__product_content-item">
        <div class="single__product_info-item">
            <p class="icon">{{__('front.new_pochta')}}</p>
            <h4>{{__('front.in')}} 30 ₴</h4>
        </div>
        <div class="single__product_info-item">
            <p class="icon">{{__('front.ykr_pochta')}}</p>
            <h4>{{__('front.in')}}  25 ₴</h4>
        </div>
    </div>
    <div class="single__product_content-title">
        <svg>
            <use xlink:href="{{asset('front/img/icons/icons.svg#icon-card')}}"></use>
        </svg>
        <span>{{__('front.payments')}}</span>
    </div>
    <div class="single__product_content-item">
        <div class="single__product_info-item">
            <p class="icon">{{__('front.payment_card')}}</p>
        </div>
        <div class="single__product_info-item">
            <p class="icon">{{__('front.payment_post')}}</p>
        </div>
        <div class="single__product_info-item">
            <p class="icon">{{__('front.payment_invoice')}}</p>
        </div>
    </div>
</div>