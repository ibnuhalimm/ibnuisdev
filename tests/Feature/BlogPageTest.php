<?php

namespace Tests\Feature;

use App\Models\Blog\Post;
use Illuminate\Support\Str;
use Tests\TestCase;

class BlogPageTest extends TestCase
{
    public $main_posts;
    public $main_posts_ids;
    public $top_posts;
    public $top_posts_ids;
    public $except_ids;

    /**
     * Initialize `main_posts` and `top_posts`
     *
     * @return void
     */
    private function generateMainPostTopPost()
    {
        $this->main_posts = Post::mainPostOnHome();
        $this->main_posts_ids = collect($this->main_posts)->map(function($post) {
            return $post['id'];
        });

        $this->top_posts = Post::getTopPostNotInMain($this->main_posts_ids);
        $this->top_posts_ids = collect($this->top_posts)->map(function($post) {
            return $post->id;
        });

        $this->except_ids = $this->main_posts_ids->concat($this->top_posts_ids)->all();
    }

    /**
     * Should get 200 status page.
     *
     * @return void
     */
    public function testStatusPageShouldOk()
    {
        $response = $this->get(route('blog.index'));

        $response->assertStatus(200);
    }

    /**
     * Use right views file
     *
     * @return void
     */
    public function testUseRightViewsFile()
    {
        $response = $this->get(route('blog.index'));

        $response->assertViewIs('blog.index');
    }

    /**
     * Has `main_posts` data
     *
     * @return void
     */
    public function testHasMainPostsData()
    {
        $this->generateMainPostTopPost();

        $response = $this->get(route('blog.index'));
        $response->assertViewHas('main_posts', $this->main_posts);
    }

    /**
     * Has `top_posts` data
     *
     * @return void
     */
    public function testHasTopPostsData()
    {
        $this->generateMainPostTopPost();

        $response = $this->get(route('blog.index'));
        $response->assertViewHas('top_posts', $this->top_posts);
    }

    /**
     * Has `except_ids` data
     *
     * @return void
     */
    public function testHasExceptIds()
    {
        $this->generateMainPostTopPost();

        $response = $this->get(route('blog.index'));
        $response->assertViewHas('except_ids', $this->except_ids);
    }
}
