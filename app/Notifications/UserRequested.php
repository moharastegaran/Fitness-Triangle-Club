<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRequested extends Notification
{
    use Queueable;

    private $request;


    public function __construct($request)
    {
        $this->request = $request ;
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
        $program=null;
        $is_workout = $this->request->is_workout_program;
        $is_nutrition = $this->request->is_nutrition_program;
        if($is_workout && !$is_nutrition){
            $program = 'تمرینی';
        }elseif(!$is_workout && $is_nutrition){
            $program = 'غذایی' ;
        }else if($is_workout && $is_nutrition){
            $program = 'تمرینی و غذایی';
        }
        return [
            'request_id' => $this->request->id,
            'user' => $this->request->user->name.' '.$this->request->user->family,
            'program' => $program
        ];
    }
}
