<?php

namespace Tests\Unit\Blog;

use App\Http\Livewire\Blog\Post\LatestPost;
use App\Models\Blog\Post;
use Livewire\Livewire;
use Tests\TestCase;

class LatestPostTest extends TestCase
{
    public $except_ids = [];

    /**
     * `Latest Post` component should has following attributes
     * - except_ids
     *
     * @return void
     */
    public function test_component_has_following_attributes()
    {
        Livewire::test(LatestPost::class, [
                'except_ids' => $this->except_ids
            ])
            ->assertSet('except_ids', $this->except_ids);
    }

    /**
     * Has `posts` data
     *
     * @return void
     */
    public function test_has_posts_data()
    {
        factory(Post::class, 5)->create();

        $posts = Post::published()
            ->orderBy('created_at', 'desc')
            ->whereNotIn('id', $this->except_ids)
            ->paginate(9);

        Livewire::test(LatestPost::class, [
                'except_ids' => $this->except_ids
            ])
            ->assertSee($posts);
    }
}
