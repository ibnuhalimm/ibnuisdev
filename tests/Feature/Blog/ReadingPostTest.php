<?php

namespace Tests\Feature\Blog;

use App\Models\Blog\Post;
use App\Models\Blog\ShareButton;
use Tests\TestCase;

class ReadingPostTest extends TestCase
{
    /**
     * Should return success code.
     *
     * @return void
     */
    public function test_visitor_can_view_post_detail_page()
    {
        $post = Post::factory()->create([
            'status' => Post::STATUS_PUBLISH,
        ]);

        $response = $this->get(route('blog.post.read', ['slug' => $post->slug]));
        $response->assertStatus(200)
            ->assertViewIs('blog.post.read');
    }

    /**
     * Should return 404 page for not published post.
     *
     * @return void
     */
    public function test_return_not_found_page_for_drafted_post()
    {
        $post = Post::factory()->create([
            'status' => Post::STATUS_DRAFT,
        ]);

        $response = $this->get(route('blog.post.read', ['slug' => $post->slug]));
        $response->assertStatus(404);
    }

    /**
     * Should return read page for drafted post on preview mode.
     *
     * @return void
     */
    public function test_success_page_for_drafted_post_on_preview_mode()
    {
        $post = Post::factory()->create([
            'status' => Post::STATUS_DRAFT,
        ]);

        $response = $this->get(route('blog.post.read', ['slug' => $post->slug, 'mode' => 'preview']));
        $response->assertStatus(200);
    }
}
