<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'month' => $faker->numberBetween(1, 12),
        'year' => $faker->dateTimeThisDecade()->format('Y'),
        'name' => $faker->company,
        'image' => 'project/' . $faker->randomNumber() . '.png',
        'description' => $faker->text(),
        'link' => $faker->url,
        'status' => $faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH])
    ];
});
