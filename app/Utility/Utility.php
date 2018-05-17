<?php

namespace App\Utility;
use App\Treatment;
use App\Date;
use Illuminate\Support\Facades\DB;
class Utility
{
	/**
		Data un array ed un elemento ritorna le occorrenze di quell'elemento nell'array.
	*/
	private static function map($array,$element)
	{
		$quantity = 0;
		foreach($array as $e) if($e == $element) $quantity++;
		return $quantity;
	}


	/**
		Funzione che mappa oggetto -> occorrenze nell'array.
	*/
	public static function create_mapping($array,$key)
	{
		$map = [];
        foreach($array as $element)
	    if (!array_key_exists($element[$key], $map))
	    {
	        $counted= array($element[$key] => Utility::map($array,$element));
	        $map = array_merge($map,$counted);
	    }
        return $map;
	}

	public static function create_date_mapping($array,$key)
	{
		$map = [];
        foreach($array as $element)
        if (!array_key_exists($element[$key], $map))
        {
            $counted= array($element[$key] => ['quantity' => Utility::map($array,$element)]);
            $map = array_merge($map,$counted);
        }
        return $map;
	}

	/**
		Registra su pivot user_sale la vendita.
	*/
	public static function log($sale,$user)
	{
		$sale->user_id = $user;
	}

	/**
		Per indexDate.vue prende i trattamenti da pivot
	*/


	public static function getDatesWithPivot($dates)
	    {
	        $new = [];
	        foreach($dates as $date)
	        {
	            $treatments = $date->treatments;
	            $elem = array_merge(array($date), array($treatments));
							array_push($new, $elem[0]);
	        }
	        return $new;
	    }
}
