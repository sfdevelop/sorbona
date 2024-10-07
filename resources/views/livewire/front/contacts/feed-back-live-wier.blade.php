<div class="form">
    <div class="form__md-wrap">
        <div class="form__inpur-wrap @if($errors->has('name')) error @endif">
            <span>{{__('front.name')}}</span>
            <input
                    type="text"
                    placeholder="Name"
                    wire:model="name"
            >
            @if ($errors->has('name'))
                <div class="error_text">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form__inpur-wrap @if($errors->has('email')) error @endif">
            <span>E-mail</span>
            <input
                    type="email"
                    placeholder="E-mail"
                    wire:model="email"
            >
            @if ($errors->has('email'))
                <div class="error_text">{{ $errors->first('email') }}</div>
            @endif
        </div>
    </div>
    <div class="form__textarea-wrap form__inpur-wrap @if($errors->has('text')) error @endif">
        <span>{{__('front.message')}}</span>
        <textarea wire:model="text"></textarea>
        @if ($errors->has('text'))
            <span class="error_text">{{ $errors->first('text') }}</span>
        @endif
    </div>
    <div
            class="btn btn--transparent2"
            wire:click.prevent="createSender"
    >
        {{__('front.send_message')}}
        <img src="{{asset('front/images/dest/icons/arrow-btn2.svg')}}" alt="icon">
    </div>
</div>
