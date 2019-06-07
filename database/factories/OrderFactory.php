<?php

use Faker\Generator as Faker;

$factory->define(WeGotIt\Order::class, function (Faker $faker) {
    return [
        //
        'user_id' => 1,
        'price' => $faker->randomFloat(2,1,20),
        'description' => $faker->paragraph,
        'type' => 'pickup'
    ];
});
