<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ability;
use Faker\Generator as Faker;

$factory->define(Ability::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->words(2, true)
    ];
});
