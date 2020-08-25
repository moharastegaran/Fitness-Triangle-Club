<?php

namespace App\Notifications;

use App\WorkoutProgram;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeadlineWarning extends Notification
{
    use Queueable;


    public $program;
    public $diff;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($program,$diff)
    {
        $this->program = $program ;
        $this->diff = $diff;
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
            'program' => $this->program ,
            'is_wp' => ($this->program instanceof WorkoutProgram),
            'user' => $this->program->user,
            'diff' => $this->diff
        ];
    }
}
