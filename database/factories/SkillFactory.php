<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Skill;
use Faker\Generator as Faker;

$factory->define(Skill::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['HTML', 'Javascript', 'CSS', 'Git']),
        'order_number' => $faker->numberBetween(1, 4)
    ];
});
