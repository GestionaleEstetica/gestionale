<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    protected $fillable = [
    	'sale_id','product_id','quantity'
    ];
}
