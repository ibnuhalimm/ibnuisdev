<?php

namespace Tests\Unit\Dashboard\HomePage;

use App\Http\Livewire\Dashboard\Portfolio\Create;
use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class PortfolioCreateTest extends TestCase
{
    /**
     * Upload fake image.
     *
     * @param string $extension
     * @return mixed
     */
    private function uploadFakeImage($extension = 'jpg')
    {
        Storage::fake('livewire-tmp');

        return UploadedFile::fake()->image(Str::random(10).'.'.$extension);
    }

    /**
     * Test uploading an image.
     *
     * @return void
     */
    public function test_can_upload_image()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('image', $fake_image)
            ->assertSee('image');
    }

    /**
     * Can store new portfolio.
     *
     * @return void
     */
    public function test_can_store_new_portfolio()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('lang', $this->faker->randomElement(['id', 'en']))
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(15))
            ->set('image', $fake_image)
            ->set('description', Str::random(101))
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertRedirect(route('dashboard.portfolio.index'));
    }

    /**
     * Can not store new portfolio
     * if month is not provided.
     *
     * @return void
     */
    public function test_can_not_store_if_month_not_provided()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', null)
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(15))
            ->set('image', $fake_image)
            ->set('description', Str::random(101))
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'month' => 'required',
            ]);
    }

    /**
     * Can not store new portfolio
     * if year is not provided.
     *
     * @return void
     */
    public function test_can_not_store_if_year_not_provided()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', null)
            ->set('name', Str::random(15))
            ->set('image', $fake_image)
            ->set('description', Str::random(101))
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'year' => 'required',
            ]);
    }

    /**
     * Can not store new portfolio
     * if year digits less than 4 is not provided.
     *
     * @return void
     */
    public function test_can_not_store_if_year_less_than_four_chars()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', 11)
            ->set('name', Str::random(15))
            ->set('image', $fake_image)
            ->set('description', Str::random(101))
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'year' => 'digits',
            ]);
    }

    /**
     * Can not store new portfolio
     * if name is not provided.
     *
     * @return void
     */
    public function test_can_not_store_if_name_not_provided()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', null)
            ->set('image', $fake_image)
            ->set('description', Str::random(101))
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'name' => 'required',
            ]);
    }

    /**
     * Can not store new portfolio
     * if name less than 10 chars.
     *
     * @return void
     */
    public function test_can_not_store_if_name_less_than_ten_chars()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(9))
            ->set('image', $fake_image)
            ->set('description', Str::random(101))
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'name' => 'min',
            ]);
    }

    /**
     * Can not store new portfolio
     * if name more than 50 chars.
     *
     * @return void
     */
    public function test_can_not_store_if_name_more_than_fifty_chars()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(51))
            ->set('image', $fake_image)
            ->set('description', Str::random(101))
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'name' => 'max',
            ]);
    }

    /**
     * Can't store new portfolio
     * if image is not provided.
     *
     * @return void
     */
    public function test_can_not_store_if_image_not_provided()
    {
        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(15))
            ->set('image', null)
            ->set('description', Str::random(101))
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'image' => 'required',
            ]);
    }

    /**
     * Can't store new portfolio
     * if description not provided.
     *
     * @return void
     */
    public function test_can_not_store_if_description_not_provided()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(15))
            ->set('image', $fake_image)
            ->set('description', null)
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'description' => 'required',
            ]);
    }

    /**
     * Can't store new portfolio
     * if description less than 100 chars.
     *
     * @return void
     */
    public function test_can_not_store_if_description_less_than_ten_hundred_chars()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(15))
            ->set('image', $fake_image)
            ->set('description', substr(Str::random(101), 0, 99))
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'description' => 'min',
            ]);
    }

    /**
     * Can't store new portfolio
     * if description more than 300 chars.
     *
     * @return void
     */
    public function test_can_not_store_if_description_more_than_three_hundred_chars()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(15))
            ->set('image', $fake_image)
            ->set('description', Str::random(301))
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'description' => 'max',
            ]);
    }

    /**
     * Can't store new portfolio
     * if url is invalid.
     *
     * @return void
     */
    public function test_can_not_store_if_url_is_invalid()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(15))
            ->set('image', $fake_image)
            ->set('description', Str::random(301))
            ->set('link', $this->faker->word())
            ->set('status', $this->faker->randomElement([Project::STATUS_DRAFT, Project::STATUS_PUBLISH]))
            ->call('submitCreateProject')
            ->assertHasErrors([
                'link' => 'url',
            ]);
    }

    /**
     * Can't store new portfolio
     * if status is not provided.
     *
     * @return void
     */
    public function test_can_not_store_if_status_not_provided()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(15))
            ->set('image', $fake_image)
            ->set('description', Str::random(301))
            ->set('link', $this->faker->url)
            ->set('status', null)
            ->call('submitCreateProject')
            ->assertHasErrors([
                'status' => 'required',
            ]);
    }

    /**
     * Can't store new portfolio
     * if status is not allowed.
     *
     * @return void
     */
    public function test_can_not_store_if_status_not_allowed()
    {
        $fake_image = $this->uploadFakeImage();

        Livewire::test(Create::class)
            ->set('month', $this->faker->numberBetween(1, 12))
            ->set('year', $this->faker->dateTimeThisDecade()->format('Y'))
            ->set('name', Str::random(15))
            ->set('image', $fake_image)
            ->set('description', Str::random(301))
            ->set('link', $this->faker->word())
            ->set('status', 'NOT ALLOWED!!!')
            ->call('submitCreateProject')
            ->assertHasErrors([
                'status' => 'in',
            ]);
    }
}
