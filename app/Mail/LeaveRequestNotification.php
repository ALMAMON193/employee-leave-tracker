<?php // LeaveRequestNotification.php

namespace App\Mail;

use App\Models\User;
use App\Models\LeaveRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeaveRequestNotification extends Mailable
{
  use Queueable, SerializesModels;

  public $user;
  public $leaveRequest;
  public $action;

  /**
   * Create a new message instance.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\LeaveRequest  $leaveRequest
   * @param  string  $action
   * @return void
   */
  public function __construct(User $user, LeaveRequest $leaveRequest, $action)
  {
    $this->user = $user;
    $this->leaveRequest = $leaveRequest;
    $this->action = $action;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->subject('Leave Request ' . ucfirst($this->action))
      ->view('emails.leave_request_notification');
  }
}