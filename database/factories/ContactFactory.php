<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    // $type = $faker->randomElement($array = array ('Mail','Number'));
    return [
        // 'name' => $faker->name, 
        // 'email_number' => $faker->unique()->safeEmail,
        // 'default' => $faker->boolean(50), 
        // 'type' => $faker-> $type,
    ];
});
