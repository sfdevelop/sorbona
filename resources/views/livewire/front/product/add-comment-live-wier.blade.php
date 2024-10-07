<div>
    <form class="form">
        <div class="form__inpur-wrap">
            <span>{{__('front.name')}}</span>
            <input
                    type="text"
                    placeholder="{{__('front.name')}}"
                    wire:model="name"
            >

            @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="form__textarea-wrap">
            <span>{{__("front.text")}}</span>
            <textarea wire:model="text"></textarea>

            @if ($errors->has('text'))
                <div class="invalid-feedback">{{ $errors->first('text') }}</div>
            @endif
        </div>
        <a
                wire:click.prevent="addComment"
                class="btn btn--transparent"
        >
            {{__('front.submit')}}
            <img src="{{asset('front/images/dest/icons/arrow-btn.svg')}}" alt="icon">
        </a>
    </form>
</div>
