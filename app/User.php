<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function sales()
    {
    	return $this->belongsToMany(Sale::class,'user_sale');
    }
}
