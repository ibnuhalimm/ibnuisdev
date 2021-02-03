<?php

namespace Tests\Feature\Blog;

use App\Models\Blog\Post;
use Tests\TestCase;

class SearchingPostTest extends TestCase
{
    /**
     * Should return success code
     *
     * @return void
     */
    public function testStatusPageShouldOk()
    {
        $post_title = 'Test';

        factory(Post::class)->create([
            'judul' => $post_title,
            'status' => Post::STATUS_PUBLISH
        ]);

        $response = $this->get(route('blog.post.search', [ 'q' => $post_title ]));
        $response->assertStatus(200);
    }

    /**
     * Use right views file
     *
     * @return void
     */
    public function testUseRightViewsFile()
    {
        $response = $this->get(route('blog.post.search', [ 'q' => 'test' ]));
        $response->assertViewIs('blog.post.search');
    }

    /**
     * Can handle empty result of search
     *
     * @return void
     */
    public function testCanHandleEmptyResult()
    {
        $response = $this->get(route('blog.post.search', [ 'q' => 'Test again' ]));
        $response->assertStatus(200);
    }

    /**
     * Has `posts` searching result
     *
     * @return void
     */
    public function testHasPostsData()
    {
        $search_text = 'test';

        factory(Post::class)->create([
            'judul' => $search_text
        ]);

        $posts = Post::published()->search($search_text)->orderBy('created_at', 'desc')->take(12)->get();

        $response = $this->get(route('blog.post.search', [ 'q' => $search_text ]));
        $response->assertViewHas('posts', $posts);
    }
}
