<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Client::class,40)->create();
        factory(App\Treatment::class,20)->create();
        factory(App\Product::class,30)->create();
        factory(App\Date::class,10)->create();
        factory(App\Sale::class,15)->create();
        factory(App\ProductSale::class,5)->create();
        factory(App\TreatmentSale::class,10)->create();
    }
}
