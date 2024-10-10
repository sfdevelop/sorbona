<div class="form__input-wrap  @error($model) error @enderror">
    <div>{{$title}}</div>
    <input
            class="form-control ih-medium ip-light radius-xs b-light px-15 "
            type="{{$type}}"
            wire:model="{{$model}}"
    >
    @error($model) <span class="text-danger small"> {{$message}} </span> @enderror



</div>