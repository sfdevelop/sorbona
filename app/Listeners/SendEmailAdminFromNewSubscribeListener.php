<?php

namespace App\Listeners;

use App\Events\SubscribeMailEvent;
use App\Notifications\NewSubscribeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

class SendEmailAdminFromNewSubscribeListener implements ShouldQueue
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
    public function handle(SubscribeMailEvent $event): void
    {
        Notification::send(\AdminUserFacade::getAdminUsersFromEmailSend(), new NewSubscribeNotification);
    }
}
