<?php

namespace App\Http\Livewire\Traits;

use App\DeliveryMetods\NovaPochta;

trait DeliveryDataFromOrderTrait
{
    /**
     * @return array
     */
    public function getDeliveryData(): array
    {
        $deliveryMethod = match ($this->deliverySelect) {
            'novaPochtaState' => new NovaPochta($this->selectedRegion, $this->selectedCity, $this->selectedPochta),
            default => null,
        };

        if (! $deliveryMethod || ! $deliveryMethod->isValid()) {
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => __('front.incorrect_delivery_data')]);

            return [];
        }

        return $deliveryMethod->getDeliveryData();
    }
}
