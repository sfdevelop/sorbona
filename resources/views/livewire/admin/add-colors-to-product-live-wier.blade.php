<div>
    <div class="card">
        <div class="card-body">
            @if(!empty($colors))
            @foreach($colors as $color => $data)
                <div class="row border-bottom ">
                    <div class="col-12 col-lg-10 my-2">{{$data->title}}</div>
                    <div class="col-12 col-lg-2 my-2 d-flex justify-content-end">
                        <a class="btn btn-sm btn-danger"
                           wire:click.prevent="deleteAttribute('{{ $data->id }}')">{{__('admin.delete')}}</a>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="mb-4">Додати колір</h5>
            <div class="row">

                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <label class="color-dark fs-14 fw-500 align-center"
                               for="exampleFormControlSelect1">Color</label>
                        <select
                                class="form-control {{ $errors->has('color') ? ' is-invalid' : '' }}"
                                id="color-Select"
                                name="color"
                                wire:model="color"
                        >
                            <option value="">{{__('admin.choice')}}</option>
                            @foreach (ColorFacade::getAllColors() as $category)
                                <option value="{{ $category->id }}" @selected(old('color', $product->color) == $category->id)>
                                    {{$category->title}} @if(!empty($category->sectionTitle))
                                        <small style="color: red!important; font-size: 11px">
                                            ( {{$category->sectionTitle}}
                                            )</small>
                                    @endif
                                </option>
                            @endforeach

                        </select>

                        @if ($errors->has('color'))
                            <span id="{{'color'}}-error" class="error text-danger small"
                                  for="{{'color'}}-Select}">{{ $errors->first('color') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-lg-2 pt-4">
                    <button
                            class="btn btn-purple"
                            wire:click.prevent="addColor"
                    >
                        {{__('admin.add')}}
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
