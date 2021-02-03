<?php

namespace Database\Factory\Models\Blog;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $judul = substr($faker->sentence(8), 0, 100);
    $slug = substr(Str::of($judul)->slug('-'), 0, 100);

    $gbr = Str::random(10) . '.jpg';
    if (config('app.env') != 'testing') {
        $gbr = $faker->image('storage/app/public/post', 760, 320);
    }

    return [
        'judul' => $judul,
        'slug' => $slug,
        'gbr' => Str::of($gbr)->replace('storage/app/public/', ''),
        'isi' => $faker->text(),
        'status' => $faker->numberBetween(1, 2),
        'tag' => implode(',', $faker->words(5)),
        'user_create' => 'ibnu',
        'created_at' => $faker->dateTimeBetween('-1 year', 'now', 'Asia/Jakarta')
    ];
});
