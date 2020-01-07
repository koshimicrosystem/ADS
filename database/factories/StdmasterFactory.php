<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stdmaster;
use Faker\Generator as Faker;

$factory->define(Stdmaster::class, function (Faker $faker) {
    return [
        'name' => 'Std',
    ];
});
