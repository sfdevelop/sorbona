<div class="form__item">
    <label for="{{$model}}" class="form__label">{{$title}}</label>
    <div class=" @if($type == 'password') form-item__password @endif">
        <input
                wire:model="{{$model}}"
                type="{{$type}}"
                name="{{$model}}"
                id="{{$model}}"
                class="form__input"
                placeholder="{{$title}}"
        />

        @if($type == 'password')
            <div class="form-item__password_show"></div>
        @endif

        @error($model) <span class="text-danger small"> {{$message}} </span> @enderror
        @if($model == 'mailPhone')
        @error('email') <span class="text-danger small"> {{$message}} </span> @enderror
        @error('phone') <span class="text-danger small"> {{$message}} </span> @enderror
        @endif
    </div>
</div>