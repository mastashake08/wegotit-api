<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = \WeGotIt\User::findOrFail(1);
        $business = \WeGotIt\Business::findOrFail(1);
        \WeGotIt\Order::create([
          'price' => 3.75,
          'business_id' => $business->id,
          'description' => 'Lemonade, Hot Dog',
          'user_id' => $user->id,
          'type' => 'walkup'
        ]);
    }
}
