<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Number;

class NewOrderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Order $order)
    {
        app()->setLocale('uk');
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
        $deliveryLines = '';
        foreach ($this->order->delivery as $key => $value) {
            $deliveryLines .= __('admin.order_delivery_more').': '.$key.' - '.$value."\n";
        }

        return (new MailMessage)
            ->subject(__('admin.subjectOrder'))
            ->greeting(__('admin.hello'))
            ->line(__('admin.text_order'))
            ->line(__('admin.number_order').' '.$this->order->id)
            ->line(__('admin.name').': '.$this->order->name)
            ->line(__('admin.phone_one_click').': '.$this->order->phone)
            ->line(__('admin.user_email').': '.$this->order->email)
            ->line(__('admin.order_delivery').': '.translateDelivery($this->order->deliveryTitle))
            ->line($deliveryLines)
            ->line(__('admin.order_comment').': '.$this->order->comment)
            ->line(__('admin.order_total').': '.Number::currency($this->order->total, in: 'EUR', locale: 'lt'))
            ->action(__('admin.see'), route('admin.order.index'));
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
