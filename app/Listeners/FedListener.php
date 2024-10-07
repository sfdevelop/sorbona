<?php

namespace App\Listeners;

use App\Actions\GetMailToSendNotification;
use App\Events\FedEvent;
use App\Notifications\NewFedbackNotification;
use Notification;

class FedListener
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
    public function handle(FedEvent $event): void
    {
        Notification::send(GetMailToSendNotification::run(), new NewFedbackNotification);
    }
}
