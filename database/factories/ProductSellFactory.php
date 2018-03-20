<?php

use Faker\Generator as Faker;

$factory->define(App\ProductSell::class, function (Faker $faker) {
    return [
        'product_id' => random_int(0,30),
        'quantity' => random_int(0,10),
        'total_price' => random_int(20,100),
    ];
});
