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
        factory(App\Client::class,20)->create();
        factory(App\Treatment::class,20)->create();
        factory(App\Product::class,30)->create();
        
    }
}
