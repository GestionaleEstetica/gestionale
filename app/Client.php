<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'first_name','last_name','phone', 'email','done_dates'
    ];
    
    public function dates()
    {
    	return $this->hasMany(Date::class);
    }
}
