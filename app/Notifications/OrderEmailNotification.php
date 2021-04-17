<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $order;
    public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order, string $name)
    {
        $this->order = $order;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Dear' . $this->name)
            ->line('Your order has been placed successfully.')
            ->line('Your order id is' . $this->order->id)
            ->action('View Details', route('order.details' . $this->order->id))
            ->line('Thank you for using our application!');
    }
}
