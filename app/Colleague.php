<?php

namespace App;
use App\Religion;
use Illuminate\Database\Eloquent\Model;

class Colleague extends Model
{
    protected $fillable = [
    	"full_name",
    	"country",
    	"work_country",
    	"office_name",
    	"position",
    	"phone1",
		"phone2",
		"phone3",
		"email",
		"website",
		"address",
		"religion_id",
		"status"
	];
	
	public function religion() {
		return $this->belongsTo(Religion::class,"religion_id");
	}
}
