<?php

use Faker\Generator as Faker;

$factory->define(App\Ad::class, function (Faker $faker) {
    return [

    	'title' => $faker->sentence,
    	'phone' => $faker->sentence,
    	'description' => $faker->paragraph,
    	'price' => $faker->randomFloat
        
    ];
});
