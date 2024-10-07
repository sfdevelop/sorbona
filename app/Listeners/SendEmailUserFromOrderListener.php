<?php

namespace App\Listeners;

use App\Events\MailFromOrderEvent;
use App\Mail\OrderCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendEmailUserFromOrderListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MailFromOrderEvent $event): void
    {
        Mail::to($event->order->email)->send(new OrderCreatedMail($event->order));
    }
}
