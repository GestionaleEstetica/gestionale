<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'first_name','last_name', 'birthday', 'phone', 'email','done_dates', 'promozioni'
    ];

    public function dates()
    {
    	return $this->hasMany(Date::class);
    }

    public function promos()
    {
      return $this->hasMany(Promo::class);
    }
}
