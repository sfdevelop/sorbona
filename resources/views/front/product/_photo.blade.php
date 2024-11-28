<div class="single__product_gallery">
    <div class="single__product_images">
        @if($allManyPhotos->count() > 0 && $allManyPhotos[0] !== null)
            @foreach($allManyPhotos as $photo)
                <img src="{{$photo->getUrl('thumb-p')}}" alt="image" loading="lazy"/>
            @endforeach
        @endif
    </div>
    <div class="single__product_picture">

        @if($allManyPhotos->count() > 0 && $allManyPhotos[0] !== null)
            <img src="{{$photo->getUrl('thumb-p')}}" alt="image" loading="lazy" class="img-full"/>
        @endif

        @if($product->sale > 0)
                <div class="single__product_label">{{__('front.sale')}}</div>
        @endif

    </div>
</div>