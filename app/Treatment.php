<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
	public $timestamps = false;

    protected $fillable = [
    	'name','duration','price'
    ];

    public function date()
    {
    	return $this->belongsToMany(Date::class);
    }

    public function treatmentSale()
    {
    	return $this->belongsToMany(TreatmentSale::class);
    }

}
