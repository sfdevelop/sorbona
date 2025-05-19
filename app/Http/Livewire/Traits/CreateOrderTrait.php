<?php

namespace App\Http\Livewire\Traits;

use App\Models\Order;
use App\Patterns\Builder\Order\OrderManager;
use App\Patterns\Strategy\OrderItems\StrategyOrderItemsManager;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use SebastianBergmann\Diff\Exception;

trait CreateOrderTrait
{
    /**
     * @param  array  $data
     * @param  array  $deliveryData
     * @return Order|void
     */
    public function createOrder(array $data, array $deliveryData)
    {
        try {
            $order = new OrderManager($data, $this->total, $this->payment, $this->delivery, $deliveryData, $this->delivery);
            $newOrder = $order->userOrder();

            $this->createOrderItems($newOrder);

            return $newOrder;
        } catch (Exception $exception) {
            \Log::error($exception);
            //            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => __('toastr.something_went_wrong')]);
        } catch (InvalidAssociatedException|InvalidModelException $e) {
            \Log::error($e);
            //            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => __('toastr.something_went_wrong')]);
        }
    }

    /**
     * @param  Order  $order
     * @return void
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    protected function createOrderItems(Order $order): void
    {
        $strategy = new StrategyOrderItemsManager;
        $items = $strategy->makeItemsUniform($this->getItemsFromCart());

        foreach ($items as $item) {
            $order->orderItems()->create($item);
        }
    }

    /**
     * @param  Order  $order
     * @return void
     */
    protected function startStatus(Order $order): void
    {
        $order->OrderStatusCheck()->create(['status_id' => 1]);
    }
}
