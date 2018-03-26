<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }

    public function treatments()
    {
    	return $this->belongsToMany(Treatment::class);
    }
}
