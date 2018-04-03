<?php

namespace App\Utility;

class Utility
{
	public static function map($array,$element)
	{
		$quantity = 0;
		foreach($array as $e) if($e == $element) $quantity++;
		return $quantity;
	}

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
}
