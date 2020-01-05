<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faculty;
use Faker\Generator as Faker;

$factory->define(Faculty::class, function (Faker $faker) {
    return [
        'doj' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = '-1 days'),
    ];
});
