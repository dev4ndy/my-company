<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->unique()->domainName,
        'logo' => $faker->image('storage/app/public', 100, 100, null, false)
    ];
});
