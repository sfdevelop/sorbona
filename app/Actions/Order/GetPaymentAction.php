<?php

namespace App\Actions\Order;

use App\Models\Payment;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Support\HigherOrderCollectionProxy;
use Lorisleiva\Actions\Concerns\AsAction;

class GetPaymentAction
{
    use AsAction;

    /**
     * @param  string  $payment
     * @return HigherOrderBuilderProxy|HigherOrderCollectionProxy|mixed
     */
    public function handle(string $payment): mixed
    {
        $paymentTypes = [
            'paymentCard' => 1,
            'paymentOverlay' => 2,
            'paymentUR' => 3,
        ];

        $idPayment = $paymentTypes[$payment] ?? 0;

        $collect = Payment::query()->find($idPayment);

        return $collect;
    }
}
