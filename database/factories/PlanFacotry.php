<?php

use Faker\Generator as Faker;
use App\Models\Plan;

$factory->define(Plan::class, function (Faker $faker) {
    return [
    'name' => $faker->firstName,
    'space' => $faker->numberBetween(10, 100),
    'transfer' => $faker->numberBetween(100,1000),
    'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50)
    ];
});
