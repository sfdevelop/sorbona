<?php

namespace App\Providers;

use App\Events\FedEvent;
use App\Events\FeedbackMailEvent;
use App\Events\MailFromChangeStatusOnSuccessOrderEvent;
use App\Events\MailFromFromPresaleProductEvent;
use App\Events\MailFromOrderEvent;
use App\Events\RegistrationUserEvent;
use App\Events\SubscribeMailEvent;
use App\Listeners\FedListener;
use App\Listeners\SendEmailAdminFromChangeStatusOnSuccessFromAdminOrderListener;
use App\Listeners\SendEmailAdminFromChangeStatusOnSuccessFromUserOrderListener;
use App\Listeners\SendEmailAdminFromNewFeedbackListener;
use App\Listeners\SendEmailAdminFromNewOrderListener;
use App\Listeners\SendEmailAdminFromNewSubscribeListener;
use App\Listeners\SendEmailRegistrationUserListener;
use App\Listeners\SendEmailUserFromOrderListener;
use App\Listeners\SendEmailUserFromPresaleProductListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        FedEvent::class => [
            FedListener::class,
        ],

        FeedbackMailEvent::class => [
            SendEmailAdminFromNewFeedbackListener::class,
        ],

        SubscribeMailEvent::class => [
            SendEmailAdminFromNewSubscribeListener::class,
        ],

        RegistrationUserEvent::class => [
            SendEmailRegistrationUserListener::class,
        ],

        MailFromChangeStatusOnSuccessOrderEvent::class => [
            SendEmailAdminFromChangeStatusOnSuccessFromUserOrderListener::class,
            SendEmailAdminFromChangeStatusOnSuccessFromAdminOrderListener::class,
        ],

        MailFromOrderEvent::class => [
            SendEmailUserFromOrderListener::class,
            SendEmailAdminFromNewOrderListener::class,
        ],

        MailFromFromPresaleProductEvent::class => [
            SendEmailUserFromPresaleProductListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
