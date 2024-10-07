<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewFeedbackNotification extends Notification
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
            ->subject('Зворотній зв\'язок з сайту - '.config('sfdevelop.NAME_PROJECT'))
            ->from(config('mail.from.address'))
            ->line('У вас нове сповіщення "Зворотній зв\'язок зі сторінки контактів" на сайті - '.config('sfdevelop.NAME_PROJECT'))
            ->line('Подивитися його можна в адміністративній частині сайту')
            ->line('Час створення - '.now()->format('d-m-Y H:i'))
            ->action(__('admin.see'), route('admin.feedback.index'));
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
