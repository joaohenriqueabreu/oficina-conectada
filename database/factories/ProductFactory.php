<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'url' => $faker->unique()->url,
        'email' => $faker->unique()->safeEmail,
        'title' => $faker->unique()->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'logo_url' => $faker->unique()->imageUrl($width = 640, $height = 480),
        'callback_url' => $faker->unique()->url,        
        'public_token' => Hash::make(str_random(8)), // secret
        'private_token' => Hash::make(str_random(8)), // secret
                
    ];
});
