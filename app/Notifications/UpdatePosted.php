<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UpdatePosted extends Notification
{
    use Queueable;

    protected $repair;
    protected $vendor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($repair, $vendor)
    {
        $this->repair = $repair;
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
    public function toDatabase($notifiable)
    {
        return [
            'repair' => $this->repair,
            'vendor' => $this->vendor
        ];
    }
}
