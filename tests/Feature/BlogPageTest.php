<?php

namespace Tests\Feature;

use App\Models\Blog\Post;
use Tests\TestCase;

class BlogPageTest extends TestCase
{
    /**
     * User can view blog page
     *
     * @return void
     */
    public function testUserCanViewBlogPage()
    {
        factory(Post::class, 10)->create();

        $response = $this->get(route('blog.index'));

        $response->assertStatus(200)
            ->assertViewIs('blog.index');
    }

    /**
     * Contains latest-post livewire component
     *
     * @return void
     */
    public function testContainsLatestPostLivewire()
    {
        factory(Post::class, 10)->create();

        $response = $this->get(route('blog.index'));

        $response->assertSeeLivewire('blog.post.latest-post');
    }
}
