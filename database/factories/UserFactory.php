<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
    	'first_name'=>'Franco',
    	'last_name'=>'Tullo',
        ];
});