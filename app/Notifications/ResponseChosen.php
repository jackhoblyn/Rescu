<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResponseChosen extends Notification
{
    use Queueable;

    public $repair;
    public $ad;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($repair, $ad, $user)
    {
        $this->repair = $repair;
        $this->ad = $ad;
        $this->user = $user;
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
            'repair'=>$this->repair,
            'ad'=>$this->ad,
            'user'=>$this->user   
        ];
    }
}
