<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
	public $timestamps = false;

    protected $fillable = [
    	'name','duration','price'
    ];

    public function dates()
    {
    	return $this->belongsToMany(Date::class,'date_treatment');
    }

    public function sales()
    {
    	return $this->belongsToMany(Sale::class,'treatment_sale');
    }

		public function promo()
		{
			return $this->belongsTo(Promo::class);
		}

}
