<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSending extends Mailable
{
    use Queueable, SerializesModels;

    public $body;

    /**
     * Create a new message instance.
     *
     * @param $body
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.MailSending')->with('body',$this->body);
    }
}
