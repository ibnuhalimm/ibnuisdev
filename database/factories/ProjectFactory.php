<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'month' => $faker->numberBetween(1, 12),
        'year' => $faker->dateTimeThisDecade()->format('Y'),
        'name' => substr($faker->company . ' ' . $faker->words(3, true), 0, 50),
        'image' => 'project/' . $faker->randomNumber() . '.png',
        'description' => $faker->text() . Str::random(50),
        'link' => $faker->url,
        'status' => $faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH])
    ];
});
