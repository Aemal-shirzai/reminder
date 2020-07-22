<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMsgs extends Mailable
{
    use Queueable, SerializesModels;
    public $content;
    public $name;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$message, $subject)
    {
        $this->content = $message;
        $this->name = $name;
        $this->subject = $subject;
    }   

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contact')->subject($this->subject);
    }
}
