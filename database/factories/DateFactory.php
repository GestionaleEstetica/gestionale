<?php

use Faker\Generator as Faker;

$factory->define(App\Date::class, function (Faker $faker) {
    return [
        'client_id' => random_int(0,10),
        'date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 years'),
        'treatment_id'=>random_int(0,30),
    ];
});
