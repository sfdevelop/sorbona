<?php

namespace App\Http\Livewire\Order;

use App\Enum\StatusOrderEnum;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ChangeStatusLiveWier extends Component
{
    public Order $order;

    public array $statuses;

    public string $status = '';

    protected $listeners = ['refreshChangeStatusLiveWier' => '$refresh'];

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->statuses = StatusOrderEnum::cases();
    }

    /**
     * @return void
     */
    public function changeStatus(): void
    {
        try {
            $this->order->update([
                'statusOrder' => $this->status,
            ]);

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
