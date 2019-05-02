<?php

use Faker\Generator as Faker;

$factory->define(App\Repair::class, function (Faker $faker) {
    return [

    	'title' => $faker->word,
    	'phone' => $faker->word,
    	'pic' => 'default.jpg',
    	'description' => $faker->sentence,
    	'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99.00),
    	'user_id' => factory(App\User::class),
    	'vendor_id' => factory(App\Vendor::class),
        'ad_id' => factory(App\Ad::class),
        'response_id' => factory(App\Response::class),
    	'progress'=>$faker->randomDigitNotNull
    	
    ];
});
