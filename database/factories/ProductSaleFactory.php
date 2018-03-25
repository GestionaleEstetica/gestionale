<?php

use Faker\Generator as Faker;

$factory->define(App\ProductSale::class, function (Faker $faker) {
    return [
        'product_id' => App\Product::all()->random()->id,
        'sale_id' => App\Sale::all()->random()->id,
        'quantity' => random_int(0,5)
    ];
});
