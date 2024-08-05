<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class BaseNotification extends Notification
{
    public $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function via()
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
             // your payload
        ];
    }
}