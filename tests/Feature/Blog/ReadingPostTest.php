<?php

namespace Tests\Feature\Blog;

use App\Models\Blog\Post;
use App\Models\Blog\ShareButton;
use Tests\TestCase;

class ReadingPostTest extends TestCase
{
    /**
     * Should return success code
     *
     * @return void
     */
    public function testUserCanViewPostDetailPage()
    {
        $post = factory(Post::class)->create([
            'status' => Post::STATUS_PUBLISH
        ]);

        $response = $this->get(route('blog.post.read', [ 'slug' => $post->slug ]));
        $response->assertStatus(200)
            ->assertViewIs('blog.post.read');
    }

    /**
     * Should return 404 page for not published post
     *
     * @return void
     */
    public function testReturnNotFoundPageForDraftedPost()
    {
        $post = factory(Post::class)->create([
            'status' => Post::STATUS_DRAFT
        ]);

        $response = $this->get(route('blog.post.read', [ 'slug' => $post->slug ]));
        $response->assertStatus(404);
    }

    /**
     * Should return read page for drafted post on preview mode
     *
     * @return void
     */
    public function testSuccessPageForDraftedPostOnPreviewMode()
    {
        $post = factory(Post::class)->create([
            'status' => Post::STATUS_DRAFT
        ]);

        $response = $this->get(route('blog.post.read', [ 'slug' => $post->slug, 'mode' => 'preview' ]));
        $response->assertStatus(200);
    }
}
