<?php

namespace App\Listeners;

use App\Events\MailFromChangeStatusOnSuccessOrderEvent;
use App\Notifications\ChangeOrderStatusPayOnSuccessFromAdminNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

class SendEmailAdminFromChangeStatusOnSuccessFromAdminOrderListener implements ShouldQueue
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
        Notification::send(\AdminUserFacade::getAdminUsersFromEmailSend(), new ChangeOrderStatusPayOnSuccessFromAdminNotification($event->order));
    }
}
