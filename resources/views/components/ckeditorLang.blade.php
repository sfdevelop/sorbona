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
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            @foreach(config('translatable.locales') as $locale)
            ClassicEditor
                .create(document.querySelector('#editor-{{ $locale }}'), {
                    ckfinder: {
                        {{--uploadUrl: "{{ route('admin.product.uploadMedia', ['_token' => csrf_token() ]) }}"--}}
                        uploadUrl: '{{route('admin.product.uploadMedia').'?_token='.csrf_token()}}',
                    }
                })
                .then(editor => {
                    editor.ui.view.editable.element.style.minHeight = '300px'; // Set your desired minimum height
                })
                .catch(error => {
                    console.error(error);
                });
            @endforeach
        });
    </script>

@endpushonce

<style>
    .ck-editor__editable {
        min-height: 300px; /* Set your desired minimum height */
    }
</style>