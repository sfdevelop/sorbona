<div class="cart__left">
    <form class="form">

        <h5 class="">
            <span>1.</span>
            {{__('front.menu.contacts')}}
        </h5>
        <div class="form__inpur-wrap @if($errors->has('name')) error @endif ">

            <span>{{__('front.first_and_last_name')}}</span>
            <input type="text" placeholder="{{__('front.first_and_last_name')}}" wire:model="name">

            @if ($errors->has('name'))
                <div class="error_text">{{ $errors->first('name') }}</div>
            @endif

        </div>
        <div class="form__inpur-wrap @if($errors->has('phone')) error @endif">
            <span>{{__('front.phone')}}</span>
            <input type="text" placeholder="+38 (012) 345-67-89" wire:model="phone">

            @if ($errors->has('phone'))
                <div class="error_text">{{ $errors->first('phone') }}</div>
            @endif
        </div>
        <div class="form__inpur-wrap @if($errors->has('email')) error @endif">
            <span>E-mail</span>
            <input type="email" placeholder="E-mail" wire:model="email">

            @if ($errors->has('email'))
                <div class="error_text">{{ $errors->first('email') }}</div>
            @endif
        </div>

        @include('livewire.front.cart._payment')
        @include('livewire.front.cart._delivery')

        <h5>
            <span class="">4.</span>
            {{__('front.comment')}}
        </h5>
        <div class="form__textarea-wrap ">
            <span>{{__('front.message')}}</span>
            <textarea wire:model="comment"></textarea>
        </div>
    </form>
</div>
