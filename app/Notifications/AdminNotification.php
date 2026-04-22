<?php 
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class AdminNotification extends Notification
{
    use Queueable;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database']; // sirf DB me store
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
        ];
    }
}