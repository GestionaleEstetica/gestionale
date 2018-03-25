<?php

use Faker\Generator as Faker;

$factory->define(App\TreatmentSale::class, function (Faker $faker) {
    return [
        'treatment_id' => App\Treatment::all()->random()->id,
        'sale_id' => App\Sale::all()->random()->id,
        'quantity' => random_int(0,2)
    ];
});
