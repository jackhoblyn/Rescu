<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResponsePosted extends Notification
{
    use Queueable;

    protected $user;
    protected $ad;
    protected $vendor;

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
    public function toDatabase($notifiable)
    {
        return [
            // 'user_id' => $this->user->id,
            // 'ad_id' => $this->ad->id,
            // 'ad_phone' => $this->ad->phone,
            // 'replyTime' => Carbon::now(),
            // 'vendor_name' => $this->vendor->name,

            'ad_name'=>$this->ad->title,
            'user_name'=>$this->user->name,
            'vendor_name'=>$this->vendor->name
        ];
    }
}
