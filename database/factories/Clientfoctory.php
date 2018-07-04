<?php

use Faker\Generator as Faker;
use App\Models\Client;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('123456'),
        'email_second' => $faker->email,
        'phone' => $faker->phoneNumber,
        'type' => $faker->boolean,
        'cpf_cnpj' => $faker->randomNumber(6),
        'company_name' => $faker->company,
        'address' => $faker->address,
        'number' => $faker->randomNumber(4),
        'complement' => $faker->text(20),
        'district' => $faker->citySuffix,
        'postal_code' => $faker->postcode,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'type_register' => $faker->boolean,
        'information' => $faker->text(300)
    ];
});
