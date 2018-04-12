<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
  public function clients()
  {
    return $this->belongsTo(Client::class);
  }

  public function treatments()
  {
    return $this->hasOne(Treatment::class)->withPivot('quantity');;
  }
}
