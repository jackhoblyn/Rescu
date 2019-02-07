<?php

use Faker\Generator as Faker;

$factory->define(App\Ad::class, function (Faker $faker) {
    return [

    	'title' => $faker->sentence,
    	'phone' => $faker->sentence,
    	'description' => $faker->paragraph,
    	'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 300.00),
    	'user_id' => function () {

    		return factory(App\User::class)->create()->id;
    	}
        
    ];
});
