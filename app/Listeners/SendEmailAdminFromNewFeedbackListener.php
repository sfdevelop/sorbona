<?php

namespace App\Listeners;

use App\Events\FeedbackMailEvent;
use App\Notifications\NewFeedbackNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

class SendEmailAdminFromNewFeedbackListener implements ShouldQueue
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
    public function handle(FeedbackMailEvent $event): void
    {
        Notification::send(\AdminUserFacade::getAdminUsersFromEmailSend(), new NewFeedbackNotification);
    }
}
