<div
        class="form-group
        mb-{{$with}}"
>
    <label
            for="{{$name}}_{{$locale}}"
            class="color-dark fs-14 fw-500 align-center"
    >
        {{$title}}
    </label>

    <textarea
            class="form-control ih-medium ip-gray radius-xs b-light px-15
            @error($locale.'.'.$name) is-invalid @enderror"
            name="{{$locale}}[{{$name}}]"
            style="height: 175px;"
            id="{{$name}}"
            placeholder="{{$title}} {{ strtoupper($locale)}}"
    >{{ old($locale.".$name", $item->translate($locale,  true)->$name ?? '') }}</textarea>

    @if ($errors->has($locale.'.'.$name))
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif

</div>