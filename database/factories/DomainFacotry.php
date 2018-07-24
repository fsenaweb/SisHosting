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
        'information' => $faker->text(300)
    ];
});
