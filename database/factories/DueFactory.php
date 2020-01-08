<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Due;
use Faker\Generator as Faker;

$factory->define(Due::class, function (Faker $faker) {
    return [
        'due_date' => $faker->dateTime($max = 'now', $timezone = null),
        'last_date' => $faker->dateTimeBetween($startDate = '5 days', $endDate = '10 days', $timezone = null),
    ];
});
