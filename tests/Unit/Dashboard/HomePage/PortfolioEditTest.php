<?php

namespace Tests\Unit\Dashboard\HomePage;

use App\Http\Livewire\Dashboard\Portfolio\Edit;
use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class PortfolioEditTest extends TestCase
{
    /**
     * Upload fake image
     *
     * @param string $extension
     * @return mixed
     */
    private function uploadFakeImage($extension = 'jpg')
    {
        Storage::fake('livewire-fake');

        return UploadedFile::fake()->image(Str::random(10) . '.' . $extension);
    }

    /**
     * Test uploading an image
     *
     * @return void
     */
    public function test_can_upload_image()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('image', $fake_image)
            ->assertSee('image');
    }

    /**
     * Can update portfolio
     *
     * @return void
     */
    public function test_can_update_portfolio()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', $project->name)
            ->set('image', $fake_image)
            ->set('description', $project->description)
            ->set('link', $project->link)
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertRedirect(route('dashboard.portfolio.index'));
    }

    /**
     * Can not update portfolio
     * if month is not provided
     *
     * @return void
     */
    public function test_can_not_update_if_month_not_provided()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', null)
            ->set('year', $project->year)
            ->set('name', $project->name)
            ->set('image', $fake_image)
            ->set('description', $project->description)
            ->set('link', $project->link)
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'month' => 'required'
            ]);
    }

    /**
     * Can not update portfolio
     * if year is not provided
     *
     * @return void
     */
    public function test_can_not_update_if_year_not_provided()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', null)
            ->set('name', $project->name)
            ->set('image', $fake_image)
            ->set('description', $project->description)
            ->set('link', $project->link)
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'year' => 'required'
            ]);
    }

    /**
     * Can not update portfolio
     * if year digits less than 4 is not provided
     *
     * @return void
     */
    public function test_can_not_update_if_year_less_than_four_chars()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', 22)
            ->set('name', $project->name)
            ->set('image', $fake_image)
            ->set('description', $project->description)
            ->set('link', $project->link)
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'year' => 'digits'
            ]);
    }

    /**
     * Can not update portfolio
     * if name is not provided
     *
     * @return void
     */
    public function test_can_not_update_if_name_not_provided()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', null)
            ->set('image', $fake_image)
            ->set('description', $project->description)
            ->set('link', $project->link)
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'name' => 'required'
            ]);
    }

    /**
     * Can not update portfolio
     * if name less than 10 chars
     *
     * @return void
     */
    public function test_can_not_update_if_name_less_than_ten_chars()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', Str::random(9))
            ->set('image', $fake_image)
            ->set('description', $project->description)
            ->set('link', $project->link)
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'name' => 'min'
            ]);
    }

    /**
     * Can not update portfolio
     * if name more than 50 chars
     *
     * @return void
     */
    public function test_can_not_update_if_name_more_than_fifty_chars()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', Str::random(51))
            ->set('image', $fake_image)
            ->set('description', $project->description)
            ->set('link', $this->faker->url)
            ->set('status', $this->faker->randomElement([ Project::STATUS_DRAFT, Project::STATUS_PUBLISH ]))
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'name' => 'max'
            ]);
    }

    /**
     * Can update portfolio
     * if image is not provided
     *
     * @return void
     */
    public function test_can_update_if_image_not_provided()
    {
        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', $project->name)
            // ->set('image', null)
            ->set('description', $project->description)
            ->set('link', $project->link)
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertRedirect(route('dashboard.portfolio.index'));
    }

    /**
     * Can't update portfolio
     * if description not provided
     *
     * @return void
     */
    public function test_can_not_update_if_description_not_provided()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', $project->name)
            ->set('image', $fake_image)
            ->set('description', null)
            ->set('link', $project->link)
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'description' => 'required'
            ]);
    }

    /**
     * Can't update portfolio
     * if description less than 100 chars
     *
     * @return void
     */
    public function test_can_not_update_if_description_less_than_ten_hundred_chars()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', $project->name)
            ->set('image', $fake_image)
            ->set('description', substr(Str::random(101), 0, 99))
            ->set('link', $project->link)
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'description' => 'min'
            ]);
    }

    /**
     * Can't update portfolio
     * if description more than 300 chars
     *
     * @return void
     */
    public function test_can_not_update_if_description_more_than_three_hundred_chars()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', $project->name)
            ->set('image', $fake_image)
            ->set('description', Str::random(301))
            ->set('link', $project->link)
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'description' => 'max'
            ]);
    }

    /**
     * Can't update portfolio
     * if url is invalid
     *
     * @return void
     */
    public function test_can_not_update_if_url_is_invalid()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', $project->name)
            ->set('image', $fake_image)
            ->set('description', $project->description)
            ->set('link', $this->faker->word())
            ->set('status', $project->status)
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'link' => 'url'
            ]);
    }

    /**
     * Can't update portfolio
     * if status is not provided
     *
     * @return void
     */
    public function test_can_not_update_if_status_not_provided()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', $project->name)
            ->set('image', $fake_image)
            ->set('description', $project->description)
            ->set('link', $project->link)
            ->set('status', null)
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'status' => 'required'
            ]);
    }

    /**
     * Can't update portfolio
     * if status is not allowed
     *
     * @return void
     */
    public function test_can_not_update_if_status_not_allowed()
    {
        $fake_image = $this->uploadFakeImage();

        $project = factory(Project::class)->create();

        Livewire::test(Edit::class, [ 'project' => $project ])
            ->set('project_id', $project->id)
            ->set('month', $project->month)
            ->set('year', $project->year)
            ->set('name', $project->name)
            ->set('image', $fake_image)
            ->set('description', $project->description)
            ->set('link', $project->link)
            ->set('status', 'NOT ALLOWED!!!')
            ->call('submitUpdateProject')
            ->assertHasErrors([
                'status' => 'in'
            ]);
    }
}
