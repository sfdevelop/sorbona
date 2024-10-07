<section class="u-excellence"
         style=" background-image: url('{{asset('front/images/dest/content/excellence-bg.png')}}');">
    <div class="container">
        <h3 class="title element-animation">
            {{__('front.our_values')}}
        </h3>
        <ul class="u-excellence__list">

            @foreach($values as $value)
                @php /** @var  \App\Models\Values $value */ @endphp
                <li class="element-animation">
                    <img src="{{$value->img_original}}" alt="icon-value-{{$value->title}}">
                    <h6>
                        {{$value->title}}
                    </h6>
                    <p>
                        {{$value->description}}
                    </p>
                </li>
            @endforeach
        </ul>
    </div>
</section>