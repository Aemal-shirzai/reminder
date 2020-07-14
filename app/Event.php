<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ["message","religion_id","date"];

    public function religion() {
		return $this->belongsTo(Religion::class,"religion_id");
	}
}
