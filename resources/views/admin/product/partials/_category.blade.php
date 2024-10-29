<div class="col-12 col-lg-12 ">
    @php /** @var \App\Models\Product $item */ @endphp
    <div class="form-group select-px-15 tagSelect-rtl">
        <label class="il-gray fs-14 fw-500 align-center mb-10">{{__('admin.category')}}</label>
        <select
                name="category_id"
                class="form-control category {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
        >
            <option value=""></option>
            @foreach(CategoryFacade::categoriesWithoutChildrenCategory() as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>


        @if ($errors->has('category_id'))
            <span class="error text-danger small">{{ $errors->first('category_id') }}</span>
        @endif
    </div>
</div>

@pushonce('js')
    <script>
        $(document).ready(function () {
            $('.category').select2().val({{old('category_id', $item->category_id)  ??  null}}).trigger('change')
        });
    </script>
@endpushonce