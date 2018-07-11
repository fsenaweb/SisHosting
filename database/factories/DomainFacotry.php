<?php

use App\Models\Plan;
use Faker\Generator as Faker;
use App\Models\Client;
use App\Models\Domain;

$factory->define(Domain::class, function (Faker $faker) {
    return [
        'client_id' => function () {
            return factory(Client::class)->create()->id;
        },
        'domain' => $faker->domainName,
        'plan_id'=> function () {
            return factory(Plan::class)->create()->id;
        },
        'payment' => $faker->numberBetween(1,3),
        'frequency' => $faker->numberBetween(1,5),
        'day_invoice' => $faker->numberBetween(1,9),
        'first_data_invoice' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'first_amount_invoice' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50),
        'amount_invoice' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50),
        'information' => $faker->text(300)
    ];
});
