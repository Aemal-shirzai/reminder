<?php

namespace App\Console\Commands;
use App\Mail\dailyWordMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class dailyWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:word';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command send word to users every day';

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
        $words = [
            'aberration' => 'a state or condition markedly different from the norm',
            'convivial' => 'occupied with or fond of the pleasures of good company',
            'diaphanous' => 'so thin as to transmit light',
            'elegy' => 'a mournful poem; a lament for the dead',
            'ostensible' => 'appearing as such but not necessarily so'
        ];

        $key = array_rand($words);
        $value = $words[$key];

        $mails = ["aemal_shirzai@yahoo.com","aemalshirzai2016@gmail.com"];
        foreach($mails as $mail) {
            Mail::to($mail)->send(new dailyWordMail($key, $value));
        }

    }
}
