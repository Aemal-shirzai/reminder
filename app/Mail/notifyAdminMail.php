<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notifyAdminMail extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $content;
    public $religion;
    public $countDays;
    public $eventDate;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $message, $religion,$countDays,$eventDate)
    {
        $this->title = $title;
        $this->content = $message;
        $this->religion = $religion;
        $this->countDays = $countDays;
        $this->eventDate = $eventDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notifyAdmin');
    }
}
