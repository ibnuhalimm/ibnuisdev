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
    public function testUserCanViewSearchResultPage()
    {
        $post_title = 'Test';

        factory(Post::class)->create([
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
    public function testCanHandleEmptyResult()
    {
        $response = $this->get(route('blog.post.search', [ 'q' => 'Test again' ]));
        $response->assertStatus(200)
            ->assertViewIs('blog.post.search');
    }

    /**
     * Contains `blog.post.latest-post` livewire component
     *
     * @return void
     */
    public function testContainsLatestPostLivewire()
    {
        $response = $this->get(route('blog.post.search', [ 'q' => 'Test again' ]));
        $response->assertSeeLivewire('blog.post.latest-post');
    }
}
