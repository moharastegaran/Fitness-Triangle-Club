<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReplied extends Mailable
{
    use Queueable, SerializesModels;

    private $data ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('samwinchester2440@gmail.com')->view('contact.replyMail')->with([
            'data' => $this->data
        ]);
    }
}
