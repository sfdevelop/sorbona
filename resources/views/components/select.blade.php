<div class="form-group">
    <label class="color-dark fs-14 fw-500 align-center" for="exampleFormControlSelect1">{{$title}}</label>
    <select class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
            id="{{$name}}-Select"
            name="{{$name}}"
    >
        <option value="">Оберіть</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old($name, $item->$name) == $category->id)>
                {{$category->title}} @if(!empty($category->sectionTitle)) <small style="color: red!important; font-size: 11px"> ( {{$category->sectionTitle}} )</small>  @endif
            </option>
        @endforeach

    </select>

    @if ($errors->has($name))
        <span id="{{$name}}-error" class="error text-danger small"
              for="{{$name}}-Select}">{{ $errors->first($name) }}</span>
    @endif
</div>
