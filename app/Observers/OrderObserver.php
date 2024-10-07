<?php

namespace App\Observers;

use App\Events\MailFromChangeStatusOnSuccessOrderEvent;
use App\Events\MailFromOrderEvent;
use App\Jobs\DeleteItemOnSeeTableAfterOrderJob;
use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            DeleteItemOnSeeTableAfterOrderJob::dispatch($user);
        }
        MailFromOrderEvent::dispatch($order, app()->getLocale());
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        if ($order->isDirty('statusPay')) {
            MailFromChangeStatusOnSuccessOrderEvent::dispatch($order, app()->getLocale());
        }
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
