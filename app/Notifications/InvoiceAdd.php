<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceAdd extends Notification
{
    use Queueable;
    private $invoice_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($invoice_id)
    {
        $this->invoice_id = $invoice_id;
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
        $url = 'https://127.0.0.1:8000/invoiceDetailes/'.$this->invoice_id;

    return (new MailMessage)
        ->greeting('اضافه فاتوره جديده!')
        ->line('تم اضافه فاتوره جديده')
        ->action('عرض التفاصيل', $url)
        ->line('Thank you for using our application!');
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
