<div class="form-group">
    <label class="col-form-label">{{__('admin.description')}} {{strtoupper($locale)}}*</label>
    <div
            class="form-group{{ $errors->has($locale.'.description') ? ' has-danger' : '' }}">

        <textarea
                class="w-100 ckeditor"
                name="{{$locale}}[description]"
                rows="10"
        >{{old( $locale.'.description',$item->translate($locale)->description ?? '')  }}</textarea>

        @if ($errors->has($locale.'.description'))
            <span  class="error text-danger small"
            >{{ $errors->first($locale.'.description') }}</span>
        @endif

    </div>
</div>
