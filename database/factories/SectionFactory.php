<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Section;
use Faker\Generator as Faker;

$factory->define(Section::class, function (Faker $faker) {
    $available_section = [
        Section::SECTION_TOP,
        Section::SECTION_PORTFOLIO,
        Section::SECTION_SKILLS,
        Section::SECTION_CONTACT
    ];

    return [
        'section' => $faker->randomElement($available_section),
        'description' => $faker->text()
    ];
});
