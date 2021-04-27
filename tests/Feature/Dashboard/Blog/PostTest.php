<?php

namespace Tests\Feature\Dashboard\Blog;

use App\Models\User;
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

    /**
     * Can view post table page
     *
     * @return void
     */
    public function test_admin_can_view_post_table_page()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.post.index'));
        $response->assertStatus(200)
            ->assertViewIs('dashboard.blog.post.index');
    }

    /**
     * Contains dashboard.blog.post.table livewire component
     *
     * @return void
     */
    public function test_contains_dashboard_blog_post_table_livewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.post.index'));
        $response->assertSeeLivewire('dashboard.blog.post.table');
    }
}
