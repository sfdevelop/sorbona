<?php

namespace App\Listeners;

use App\Events\MailFromOrderEvent;
use App\Notifications\NewOrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

class SendEmailAdminFromNewOrderListener implements ShouldQueue
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
        Notification::send(\AdminUserFacade::getAdminUsersFromEmailSend(), new NewOrderNotification($event->order));
    }
}
