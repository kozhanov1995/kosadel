<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PushNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $notifiable ?? 'Стандартный текст уведомления',
            'link' => 'https://example.com',
        ];
    }

     /**
      * Get the notification's delivery channels.
      *
      * @return array<int, string>
      */
     public function via($notifiable)
     {
         return ['database'];
     }

     /**
      * Get the mail representation of the notification.
      */
     public function toMail(object $notifiable): MailMessage
     {
         //
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
