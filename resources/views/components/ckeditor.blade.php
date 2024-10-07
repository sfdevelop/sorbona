<div class="form-group">
    <label class="col-form-label">{{__('admin.description')}}*</label>
    <div
        class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
        {{--                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />--}}
        <textarea class="w-100" name="description" id="description"
                  rows="10">{{$item->description}}</textarea>
        @if ($errors->has('description'))
            <span id="description-error" class="error text-danger small"
            >{{ $errors->first('description') }}</span>
        @endif
    </div>
</div>

@push('js')
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('description');
    </script>
@endpush
