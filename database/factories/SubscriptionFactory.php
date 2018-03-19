<?php

use Faker\Generator as Faker;

$factory->define(App\Subscription::class, function (Faker $faker) {
    return [        
        'title' => $faker->unique()->word,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 999999),
        'trial' => $faker->numberBetween($min = 1, $max = 30),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),     
    ];
});
