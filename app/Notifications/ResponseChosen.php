<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResponseChosen extends Notification
{
    use Queueable;

    public $user;
    public $ad;
    public $vendor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $ad, $vendor)
    {
        $this->user = $user;
        $this->ad = $ad;
        $this->vendor = $vendor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            $this->
        ];
    }
}
