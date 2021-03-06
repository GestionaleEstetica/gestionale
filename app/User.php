<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $fillable = [
    'first_name','last_name', 'phone'
  ];
    public function sales()
    {
    	return $this->hasMany(Sale::class);
    }

    public function dates()
    {
      return $this->hasMany(Date::class);
    }
}
