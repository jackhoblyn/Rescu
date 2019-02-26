<?php

use Faker\Generator as Faker;

$factory->define(App\Response::class, function (Faker $faker) {
    return [
    	'description' => $faker->sentence,
    	'ad_id' => factory(\App\Ad::class)
        
    ];
});
