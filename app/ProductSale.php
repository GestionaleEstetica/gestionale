<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    protected $fillable = [
    	'sale_id','product_id','quantity'
    ];

    public $timestamps = false;

    public function product()
    {
    	return $this->belongsToMany(Product::class,'id');
    }

    public function sale()
    {
    	return $this->belongsToMany(Sale::class);
    }
}
