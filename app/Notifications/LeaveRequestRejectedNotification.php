<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveRequestRejectedNotification extends Notification
{
    use Queueable;

    protected $leaveRequest;

    public function __construct($leaveRequest)
    {
        $this->leaveRequest = $leaveRequest;
    }

    public function via($notifiable)
    {
        // Check if the notifiable is an object and has the necessary method
        if ($notifiable && method_exists($notifiable, 'routeNotificationFor')) {
            return ['mail'];
        }

        return [];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Leave Request Rejected')
            ->line('Your leave request has been rejected.')
            ->line('Reason: ' . $this->leaveRequest->reason);
    }
}
