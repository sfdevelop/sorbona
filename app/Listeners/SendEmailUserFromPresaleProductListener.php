<?php

namespace App\Listeners;

use App\Events\MailFromFromPresaleProductEvent;
use App\Mail\resaleMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendEmailUserFromPresaleProductListener implements ShouldQueue
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
    public function handle(MailFromFromPresaleProductEvent $event): void
    {
        Mail::to($event->user->email)->send(new resaleMail($event->products));
    }
}
