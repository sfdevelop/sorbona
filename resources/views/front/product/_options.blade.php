<div class="single__product_info-col">
    <div class="single__product_info-item">
        <p>{{__('front.manufacturer')}}:</p>
        <h4>{{$product->manufacturer->title}}</h4>
    </div>

    @foreach($characteristics as $characteristic)
        <div class="single__product_info-item">
            <p>{{$characteristic->filter->title}}</p>
            <h4>{{$characteristic->title}}</h4>
        </div>
    @endforeach

    <a href="#" class="single__product_info-col_btn btn btn--line">Задать вопрос</a>
</div>