<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
	protected $fillable = [
    	'client_id','date','time','done','description'
    ];

    public function client()
    {
    	return $this->hasOne(Client::class);
    }

    public function treatment()
    {
    	return $this->hasMany(Treatment::class);
    }
}
