<?php

namespace App\Listeners;

use App\Events\MailFromChangeStatusOnSuccessOrderEvent;
use App\Notifications\ChangeOrderStatusPayOnSuccessFromUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

class SendEmailAdminFromChangeStatusOnSuccessFromUserOrderListener implements ShouldQueue
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
    public function handle(MailFromChangeStatusOnSuccessOrderEvent $event): void
    {
        Notification::send($event->order, new ChangeOrderStatusPayOnSuccessFromUserNotification($event->order, $event->locale));
    }
}
