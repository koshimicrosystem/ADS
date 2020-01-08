<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fee;
use Faker\Generator as Faker;

$factory->define(Fee::class, function (Faker $faker) {
    $type = $faker->randomElement($array = array ('Monthly','Yearly','Quartely','Fine','Exam'));
    return [
        'name' => $faker->firstName,
        'amount' => $faker->numberBetween($min = 100, $max = 1500),
        'type' => $type,
    ];
});
