<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company_id' => $faker->biasedNumberBetween(1,20),
        'email' => $faker->unique()->email,
        'phone' => $faker->phoneNumber
    ];
});
