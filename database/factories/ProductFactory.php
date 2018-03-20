<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name'=>$faker-> unique()->name,
        'brand'=>$faker->str_random(5),
        'quantity'=>$faker->random_int(0,5),
        'price'=>$faker->random_int(0,10),
    ];
});
