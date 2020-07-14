<?php

namespace App;
use App\Colleague;
use App\Event;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $fillable = ["name"];

    public function colleagues(){
        return $this->hasMany(Colleague::class,"religion_id");
    }

    public function events() {
        return $this->hasMany(Event::class,"religion_id");
    }
    
}
