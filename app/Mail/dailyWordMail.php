<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class dailyWordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $key;
    public $value;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($key , $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.dailyWord')->subject("New English Word");
    }
}
