<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $judul = substr($this->faker->sentence(8), 0, 100);
        $slug = substr(Str::of($judul)->slug('-'), 0, 100);

        $gbr = $this->faker->image('storage/app/public/post', 760, 320);

        return [
            'judul' => $judul,
            'slug' => $slug,
            'gbr' => Str::of($gbr)->replace('storage/app/public/', ''),
            'image_credits' => 'Image by '.$this->faker->name(),
            'brief_text' => $this->faker->sentence(10),
            'isi' => $this->faker->paragraph(100),
            'status' => $this->faker->numberBetween(1, 2),
            'tag' => implode(',', $this->faker->words(5)),
            'user_create' => 'ibnu',
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now', 'Asia/Jakarta'),
        ];
    }
}
