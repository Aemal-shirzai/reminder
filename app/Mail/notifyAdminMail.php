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
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $message, $religion,$countDays,$eventDate,$type)
    {
        $this->title = $title;
        $this->content = $message;
        $this->religion = $religion;
        $this->countDays = $countDays;
        $this->eventDate = $eventDate;
        $this->type = $type;
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
