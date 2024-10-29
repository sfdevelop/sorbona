<div class="form-group">
    <label class="col-form-label">{{__('admin.description')}} {{strtoupper($locale)}}*</label>
    <div
            class="form-group{{ $errors->has($locale.'.description') ? ' has-danger' : '' }}">

        <textarea
                class="w-100 editor"
                name="{{$locale}}[description]"
                rows="10"
                id="editor-{{ $locale }}"
        >{{old( $locale.'.description',$item->translate($locale)->description ?? '')  }}</textarea>

        @if ($errors->has($locale.'.description'))
            <span  class="error text-danger small"
            >{{ $errors->first($locale.'.description') }}</span>
        @endif

    </div>
</div>
@pushonce('js')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            @foreach(config('translatable.locales') as $locale)
            CKEDITOR.replace('editor-{{ $locale }}', {
                filebrowserUploadUrl: "{{ route('admin.product.uploadMedia', ['_token' => csrf_token() ]) }}",
                filebrowserUploadMethod: 'form'
            });
            @endforeach
        });
    </script>
@endpushonce