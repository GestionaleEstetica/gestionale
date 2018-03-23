<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    protected $fillable = [
    	'product_id','quantity'
    ];

    public $timestamps = false;
}
