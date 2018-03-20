<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
      'name'=>$faker-> unique()->name,
      'duration_time_min'=>$faker->random_int(1, 20),
      'price'=>$faker->random_int(0,10),
    ];
});
