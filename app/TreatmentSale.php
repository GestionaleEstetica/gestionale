<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentSale extends Model
{
    protected $fillable = [
    	'sale_id','treatment_id','quantity'
    ];
}
