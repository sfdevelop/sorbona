<?php

namespace App\Http\Livewire\Traits;

use App\Payment\Cod;
use App\Payment\Card;
use App\Payment\Bank;

trait PaymentDataFromOrderTrait
{
    /**
     * @return array
     */
    public function getPaymentData(): array
    {
        $paymentMethod = match ($this->payment) {
            'paymentMethodCod' => new Cod(),
            'paymentMethodCard' => new Card(),
            'paymentMethodBank' => new Bank($this->companyName, $this->inn, $this->edrpou),
            default => null,
        };

        if (! $paymentMethod || ! $paymentMethod->isValid()) {
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => __('front.incorrect_payment_data')]);

            return [];
        }

        return $paymentMethod->getPaymentData();
    }
}
