<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ["title","message","religion_id","date", "status"];

    protected $dates = ['date'];


    public function religion() {
		return $this->belongsTo(Religion::class,"religion_id");
	}
}
