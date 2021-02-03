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
    public function testStatusPageShouldOk()
    {
        $post = factory(Post::class)->create([
            'status' => Post::STATUS_PUBLISH
        ]);

        $response = $this->get(route('blog.post.read', [ 'slug' => $post->slug ]));
        $response->assertStatus(200);
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

    /**
     * Use right views file
     *
     * @return void
     */
    public function testUseRightViewsFile()
    {
        $post = factory(Post::class)->create([
            'status' => Post::STATUS_PUBLISH
        ]);

        $response = $this->get(route('blog.post.read', [ 'slug' => $post->slug ]));
        $response->assertViewIs('blog.post.read');
    }

    /**
     * Has `post` data
     *
     * @return void
     */
    public function testHasPostData()
    {
        $post = factory(Post::class)->create([
            'status' => Post::STATUS_PUBLISH
        ]);

        $response = $this->get(route('blog.post.read', [ 'slug' => $post->slug ]));
        $response->assertViewHas('post', $post);
    }

    /**
     * Has `share buttons` data
     *
     * @return void
     */
    public function testHasShareButtonsData()
    {
        $post = factory(Post::class)->create([
            'status' => Post::STATUS_PUBLISH
        ]);

        factory(ShareButton::class, 3)->create();
        $share_buttons = ShareButton::orderBy('nomor_urut')->get();

        $response = $this->get(route('blog.post.read', [ 'slug' => $post->slug ]));
        $response->assertViewHas('share_buttons', $share_buttons);
    }

    /**
     * Has `related_posts` data
     *
     * @return void
     */
    public function testHasRelatedPostsData()
    {
        $post = factory(Post::class)->create([
            'status' => Post::STATUS_PUBLISH
        ]);

        $related_posts = Post::published()->relatedPosts($post->tag)->take(3)->get();

        $response = $this->get(route('blog.post.read', [ 'slug' => $post->slug ]));
        $response->assertViewHas('related_posts', $related_posts);
    }
}
