<div
        class="form-group mb-{{$with}}"
>
    <label
            for="{{$name}}_{{$locale}}"
            class="color-dark fs-14 fw-500 align-center"
    >
        {{$title}} {{strtoupper($locale)}}
    </label>

    <input
            type="{{$type}}"
            class="form-control ih-medium ip-light radius-xs b-light px-15 @error($locale.'.'.$name) is-invalid @enderror"
            name="{{$locale}}[{{$name}}]"
            value="{{ old($locale.".$name", $item->translate($locale,  true)->$name ?? '') }}"
            id="{{$name}}_{{ $locale}}"
            placeholder="{{$name}} {{ strtoupper($locale)}}"
    />

    @if ($errors->has($locale.'.'.$name))
        <div class="invalid-feedback">{{ $errors->first($locale.'.'.$name) }}</div>
    @endif

</div>