<?php

use Faker\Generator as Faker;


$factory->define(App\Date::class, function (Faker $faker) {
    return [
        'client_id' => App\Client::all()->random()->id,
        'date' => $faker->dateTimeBetween('now', '+3 months'),
        'time' => $faker->time,
        'description'=>$faker->paragraph(1),
        'done'=> (boolean)random_int(0,1)
    ];
});
