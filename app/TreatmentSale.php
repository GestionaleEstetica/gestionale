<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentSale extends Model
{
    protected $fillable = [
    	'sale_id','treatment_id','quantity'
    ];

    public $timestamps = false;

    public function treatment()
    {
    	return $this->belongsToMany(Treatment::class);
    }

    public function sale()
    {
    	return $this->belongsTo(Sale::class);
    }
}
