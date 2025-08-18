<div class="card-body border radius-md p-25">
    <div>
        <h6>Статус заказа:</h6>
        @php /**  @var \App\Models\Order $order */ @endphp

        <div class="d-flex justify-content-between my-2 border-bottom py-3">
                <span style="border-radius:5px; color: #0A0A0A; "
                      class="px-2 py-1 border-bottom">{{$order->status->title}}</span>
            <span></span>
        </div>


        <div class="form-group">
            <label for="category_id" class="il-gray fs-14 fw-500 align-center mb-10">
                Изменить статус:
            </label>
            <select
                    class="form-control px-15"
                    id="category_id"
                    tabindex="-1"
                    wire:model="status"
                    wire:ignore
            >
                <option>Выберите статус</option>
                @foreach($statuses as $status)

                    <option value="{{$status->id}}">
                        {{$status->title}}
                    </option>

                @endforeach
            </select>

            @if ($errors->has('status'))
                <div class="invalid-feedback">{{ $errors->first('status') }}</div>
            @endif
        </div>

        <button class="btn btn-sm btn-primary" wire:click.prevent="changeStatus">Применить</button>

    </div>
</div>
