<?php

namespace App\Http\Livewire\Order;

use App\Enum\StatusOrderEnum;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ChangeStatusLiveWier extends Component
{
    public Order $order;

    public array|Collection $statuses;

    public string|int|null $status = '';

    protected $listeners = ['refreshChangeStatusLiveWier' => '$refresh'];

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->statuses = Status::query()->get();
    }

    /**
     * @return void
     */
    public function changeStatus(): void
    {

        try {
            $this->order->update(['status_id' => $this->status]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Статус заказа змінений']);

            $this->emit('refreshChangeStatusLiveWier');
        } catch (\Exception $exception) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Щось пішло не так']);
        }
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.order.change-status-live-wier');
    }
}
