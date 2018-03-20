<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
	public $timestamps = false;
	
    protected $fillable = [
    	'name','duration_time_min','price'
    ];
}
