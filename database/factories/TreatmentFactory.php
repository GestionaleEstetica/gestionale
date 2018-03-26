<?php

use Faker\Generator as Faker;

$factory->define(App\Treatment::class, function (Faker $faker) {
    return [
      'name'=>$faker->unique()->name,
      'duration'=>random_int(1, 20),
      'price'=>random_int(0,10),
    ];
});
