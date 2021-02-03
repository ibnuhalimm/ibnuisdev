<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog\ShareButton;
use Faker\Generator as Faker;

$factory->define(ShareButton::class, function (Faker $faker) {
    return [
        'nama' => $faker->randomElement([ 'Facebook', 'Twitter' ]),
        'ikon' => substr($faker->word(), 0, 10),
        'url' => $faker->url,
        'nomor_urut' => $faker->numberBetween(1, 2)
    ];
});
