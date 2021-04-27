<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->image('storage/app/public/project', 1366, 768);

        return [
            'lang' => $this->faker->randomElement(['id', 'en']),
            'month' => $this->faker->numberBetween(1, 12),
            'year' => $this->faker->dateTimeThisDecade()->format('Y'),
            'name' => substr($this->faker->company() . ' ' . $this->faker->words(3, true), 0, 50),
            'image' => Str::of($image)->replace('storage/app/public/', ''),
            'description' => $this->faker->text() . Str::random(50),
            'link' => $this->faker->url(),
            'status' => $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH])
        ];
    }
}
