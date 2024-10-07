<div
        class="form-group mb-{{$with}}"
>
    <label
            for="{{$name}}"
            class="color-dark fs-14 fw-500 align-center"
    >
        {{$title}}
    </label>

    <input
            type="{{$type}}"
            class="form-control ih-medium ip-light radius-xs b-light px-15 @error($name) is-invalid @enderror"
            name="{{$name}}"
            value="{{ old("$name", $item->$name ?? '') }}"
            id="{{$name}}"
            placeholder="{{$title}}"
    />

    @if ($errors->has($name))
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif

</div>