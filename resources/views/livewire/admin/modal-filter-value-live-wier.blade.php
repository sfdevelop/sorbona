<div>

    @if($filterValue && $show)
        <div class="row">

            <div class="col-md-4 mb-3">
                <label for="title_ru" class="form-label">{{ __('admin.value') }} RU</label>
                <input type="text" class="form-control" id="title_ru" wire:model="title_ru"
                       value="{{ $filterValue['translations'][0]['title'] ?? '' }}">
                @error('title_ru') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            @if(!$filterValue->filter->numeric)
                <div class="col-md-4 mb-3">
                    <label for="title_uk" class="form-label">{{ __('admin.value') }} UK</label>
                    <input type="text" class="form-control" id="title_uk" wire:model="title_uk"
                           value="{{ $filterValue['translations'][1]['title'] ?? '' }}">
                    @error('title_uk') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            @endif
            <div class="col-md-4 mb-3">
                <label for="sort" class="form-label">{{ __('admin.sort') }}</label>
                <input type="text" class="form-control" id="sort" wire:model="sort"
                       value="{{ $filterValue->sort }}">
                @error('sort') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

        </div>
        <div class="mb-3">
            <button class="btn btn-primary" wire:click.prevent="updateFilterValue">{{ __('admin.update') }}</button>
        </div>
    @else
        <div class="d-flex justify-content-end sf_mt_0">
            <a
                    href=""
                    class="btn-warning btn-sm btn-icon text-center"
                    wire:click.prevent="showClick"
                    title="Редактировать"
            >
                <i class="las la-edit"></i>
            </a>
        </div>

    @endif
</div>