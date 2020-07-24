<?php

namespace App\Console\Commands;

use App\Event;
use App\Mail\notifyAdminMail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notifyAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify Admin when the events is going to happen in 10 days';

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
        if($events->count() > 0){
            $now = Carbon::now("Asia/kabul")->format("Y-m");
            foreach($events as $event) {
                $eventDate = $event->date->format("Y-m");
                $title = $event->title;
                $message = $event->message;
                $religion = $event->religion->name;

                if($eventDate == $now && $event->status == 0) {
                    $countDays = $event->date->diffInDays(Carbon::now("Asia/kabul")->format('Y-m-d H:i:s'));
                    if($countDays == 10) {
                        Mail::to("aemalshirzai2016@gmail.com")->send(new notifyAdminMail($title,$message,$religion,$countDays,$event->date));
                    }
                }

            }
        }
    
    }
}
