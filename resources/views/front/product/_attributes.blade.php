@if($sizes)
    <span>{{__('admin.size')}}</span>

    <div class="product__size" wire:ignore>
        @foreach($sizes as $key=>$size)
            <a href="#" wire:click.prevent="changeSize('{{$key}}')">{{$key}}</a>
        @endforeach
    </div>
    @if($errorSize)
        <div class="error__product_attr">
            {{$errorSize}}
        </div>
    @endif
@endif

@if($colors)
    <span>{{__('front.color')}}</span>

    <div class="product__color" wire:ignore>
        @foreach($colors as $keyColor=>$color)
            <a
                    href="#"
                    wire:click.prevent="changeColor('{{ $keyColor }}')"
            >
                {{$keyColor}}
            </a>
        @endforeach
    </div>
    @if($errorColor)
        <div class="error__product_attr">
            {{$errorColor}}
        </div>
    @endif
@endif

@push('css_front')
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">
@endpush