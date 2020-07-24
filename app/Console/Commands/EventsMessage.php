<?php

namespace App\Console\Commands;

use App\Colleague;
use App\Event;
use App\Mail\EventMail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EventsMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Message To Colleagues With Specific Religions From Events Table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }




    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $events = Event::all();
        $now = Carbon::now("Asia/kabul")->format("Y-m-d H");
        if($events->count() > 0) {
            foreach($events as $event){
                $title = $event->title;
                $message = $event->message;
                $religion_id = $event->religion_id; 
                $eventDate= $event->date->format("Y-m-d H");
                if($eventDate == $now && $event->status == 0) {
                    
                    $colleagues = Colleague::where("religion_id", $religion_id)->get();
                    if($colleagues->count() > 0) {
                        foreach($colleagues as $colleague) {
                            if($colleague->status == 1) {
                                Mail::to($colleague->email)->send(new EventMail($title, $message));
                            }
                        }
                    }
                    $event->update(["status"=>1]);
                    
                }
                
            }
        }
    }
}
