<?php

use Faker\Generator as Faker;

$factory->define(App\TreatmentSell::class, function (Faker $faker) {
    return [
        'treatment_id' => random_int(0,30),
        'price' => random_int(0,50)
    ];
});
