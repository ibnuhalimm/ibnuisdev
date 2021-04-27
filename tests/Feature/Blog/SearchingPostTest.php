<?php

namespace Tests\Feature\Blog;

use App\Models\Blog\Post;
use Tests\TestCase;

class SearchingPostTest extends TestCase
{
    /**
     * User can view search result page
     *
     * @return void
     */
    public function test_visitor_can_view_search_result_page()
    {
        $post_title = 'Test';

        Post::factory()->create([
            'judul' => $post_title,
            'status' => Post::STATUS_PUBLISH
        ]);

        $response = $this->get(route('blog.post.search', [ 'q' => $post_title ]));
        $response->assertStatus(200)
            ->assertViewIs('blog.post.search');
    }

    /**
     * Can handle empty result of search
     *
     * @return void
     */
    public function test_can_handle_empty_result()
    {
        $response = $this->get(route('blog.post.search', [ 'q' => 'Test again' ]));
        $response->assertStatus(200)
            ->assertViewIs('blog.post.search');
    }
}
