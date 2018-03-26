<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker-> unique()->name,
        'brand'=>str_random(5),
        'quantity'=>random_int(0,50),
        'price'=>random_int(0,40),
    ];
});
