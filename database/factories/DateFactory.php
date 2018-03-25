<?php

use Faker\Generator as Faker;


$factory->define(App\Date::class, function (Faker $faker) {
    return [
        'client_id' => App\Client::all()->random()->id,
        'date' => $faker->dateTimeBetween('now', '+3 months'),
        'time' => random_int(0, 60),
        'description'=>App\Treatment::all()->random()->id,
        'done'=> (boolean)random_int(0,1)
    ];
});
