<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function productSale()
    {
    	return $this->hasMany(ProductSale::class);
    }

    public function treatmentSale()
    {
    	return $this->hasMany(TreatmentSale::class);
    }
}
