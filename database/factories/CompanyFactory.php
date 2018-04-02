<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'logo' => "lorem-ipsum-logo.jpg",
        'website' => $faker->domainName
    ];
});
