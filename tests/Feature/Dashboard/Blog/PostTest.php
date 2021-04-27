<?php

namespace Tests\Feature\Dashboard\Blog;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * Set logged in user
     *
     * @return void
     */
    private function setLoggedInUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }


    public function test_admin_can_view_post_table_page()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.post.index'));
        $response->assertStatus(200)
            ->assertViewIs('dashboard.blog.post.index');
    }


    public function test_contains_dashboard_blog_post_table_livewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.post.index'));
        $response->assertSeeLivewire('dashboard.blog.post.table');
    }


    public function test_can_upload_image_on_tinyimce_editor()
    {
        $this->setLoggedInUser();

        $image = UploadedFile::fake()->image(Str::random(10) . '.jpg');

        $response = $this->post(route('dashboard.post.upload-image'), [ 'file' => $image ]);
        $response->assertStatus(200)
            ->assertJsonStructure(['location']);
    }
}
