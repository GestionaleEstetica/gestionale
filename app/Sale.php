<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function products()
    {
    	return $this->belongsToMany(Product::class,'product_sale')->withPivot('quantity');;
    }

    public function treatments()
    {
    	return $this->belongsToMany(Treatment::class,'treatment_sale')->withPivot('quantity');;
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
