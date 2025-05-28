<?php

namespace App\Http\Livewire\Traits;

use App\DeliveryMetods\NovaPochta;
use App\DeliveryMetods\UkrPochta;
use App\DeliveryMetods\Local;

trait DeliveryDataFromOrderTrait
{
    /**
     * @return array
     */
    public function getDeliveryData(): array
    {
        $deliveryMethod = match ($this->delivery) {
            'deliveryMethodNp' => new NovaPochta($this->selectedRegion, $this->selectedNpCity, $this->selectedNpDepot),
            'deliveryMethodUp' => new UkrPochta($this->region, $this->locality, $this->index),
            'deliveryMethodLocal' => new Local(),
            default => null,
        };

        if (! $deliveryMethod || ! $deliveryMethod->isValid()) {
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => __('front.incorrect_delivery_data')]);

            return [];
        }

        return $deliveryMethod->getDeliveryData();
    }
}
