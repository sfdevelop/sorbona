<?php

namespace App\Listeners;

use App\Events\RegistrationUserEvent;
use App\Notifications\RegistrationUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

class SendEmailRegistrationUserListener implements ShouldQueue
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
    public function handle(RegistrationUserEvent $event): void
    {
        Notification::send($event->user, new RegistrationUserNotification($event->locale));
    }
}
