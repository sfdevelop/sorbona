<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSubscribeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        app()->setLocale(config('sfdevelop.LANG_NOTIFICATION'));
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('У вас новий підписник на сайті - '.config('sfdevelop.NAME_PROJECT'))
            ->from(config('mail.from.address'))
            ->line('Подивитися на нього можна в адміністративній частині сайту')
            ->line('Час створення - '.now()->format('d-m-Y H:i'))
            ->action(__('admin.see'), route('admin.subscribe.index'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
