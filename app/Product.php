<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamps = false;

    protected $fillable = [
    	'name','brand','price', 'quantity'
    ];

    public function productSale()
    {
    	return $this->belongsToMany(ProductSale::class);
    }
}
