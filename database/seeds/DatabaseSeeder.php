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
        factory(App\Date::class,20)->create();
        factory(App\Product::class,30)->create();
        factory(App\ProductSell::class,5)->create();
        factory(App\Treatment::class,8)->create();
        factory(App\TreatmentSell::class,10)->create();
        factory(App\Client::class,10)->create();
    }
}
