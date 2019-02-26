<?php

use Faker\Generator as Faker;

$factory->define(App\Ad::class, function (Faker $faker) {
    return [

    	'title' => $faker->word,
    	'phone' => $faker->word,
    	'description' => $faker->sentence,
    	'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99.00),
    	'user_id' => factory(App\User::class)
    	
        
    ];
});
