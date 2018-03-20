<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSell extends Model
{
    protected $fillable = [
    	'product_id','quantity','total_price',
    ];
}
