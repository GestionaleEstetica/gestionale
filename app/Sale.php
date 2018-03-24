<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function productSale()
    {
    	return $this->belongsToMany(ProductSale::class);
    }

    public function treatmentSale()
    {
    	return $this->belongsToMany(TreatmentSale::class);
    }
}
