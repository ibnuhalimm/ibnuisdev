<?php

namespace Tests\Feature\Dashboard\Blog;

use App\User;
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
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    /**
     * Can view post table page
     *
     * @return void
     */
    public function testAdminCanViewPostTablePage()
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
    public function testContainsDashboardBlogPostTableLivewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.post.index'));
        $response->assertSeeLivewire('dashboard.blog.post.table');
    }
}
