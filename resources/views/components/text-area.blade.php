<div
        class="form-group
        mb-{{$with}}"
>
    <label
            for="{{$name}}"
            class="color-dark fs-14 fw-500 align-center"
    >
        {{$title}}
    </label>

    <textarea class="form-control ih-medium ip-gray radius-xs b-light px-15 @error($name) is-invalid @enderror" name="{{$name}}" style="height: 175px;"
              id="{{$name}}" placeholder="{{$title}}">{{ old("$name", $item->$name ?? '') }}</textarea>

    @if ($errors->has($name))
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif

</div>