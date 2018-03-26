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
        factory(App\Date::class,10)->create()
        ->each(function($date) {
            $bool = random_int(0,1);
            $ids = range(1,20);
            shuffle($ids);
            if($bool)
            {
                $sliced = array_slice($ids,0,2);
                $date->treatments()->attach($sliced);

            }
            else
            {
                $date->treatments()->attach(array_rand($ids,1));
            }
        });
        factory(App\Product::class,30)->create();
        factory(App\Sale::class,15)->create();
    }
}
