<?php

use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(WeGotIt\Business::class, 50)->create()->each(function ($business) {
          for($i =0; $i< 20; ++$i){
            $business->items()->save(factory(WeGotIt\Item::class)->make());
            $business->orders()->save(factory(WeGotIt\Order::class)->make());
          }
        });
    }
}
