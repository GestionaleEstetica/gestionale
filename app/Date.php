<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = [
    	'client_id','date','treatment_id'
    ];
}
