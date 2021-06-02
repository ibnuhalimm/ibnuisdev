<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use App\Models\Blog\PostVisitor;
use App\Models\Blog\ShareButton;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_posts = Post::mainPostOnHome();
        $except_ids = collect($main_posts)->map(function ($post) {
            return $post['id'];
        })->toArray();

        $data = [
            'main_posts' => $main_posts,
            'except_ids' => $except_ids,
        ];

        return view('blog.index', $data);
    }

    /**
     * Read post page.
     *
     * @param string|null $slug
     * @return \Illuminate\Http\Response
     */
    public function postRead($slug = null, $mode = null)
    {
        $post = Post::published()->where('slug', $slug)->first();
        if ($mode == 'preview') {
            $post = Post::where('slug', $slug)->first();
        }

        abort_if(! $post, 404);

        PostVisitor::storePostVisitor($post->id);

        $related_post = Post::relatedPosts($post->id, $post->tag)->take(3)->latest()->get();
        if (count($related_post) < 3) {
            $related_post = Post::whereNotIn('id', [$post->id])->take(3)->latest()->get();
        }

        $data = [
            'post' => $post,
            'share_buttons' => ShareButton::orderBy('nomor_urut')->get(),
            'related_posts' => $related_post,
        ];

        return view('blog.post.read', $data);
    }

    /**
     * Searching post.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function searchPost(Request $request)
    {
        $search_text = $request->get('q');

        if (empty($search_text)) {
            return redirect()->route('homepage');
        }

        $posts = Post::published()->search($search_text)->orderBy('created_at', 'desc')->take(12)->get();

        $except_ids = collect($posts)->map(function ($post) {
            return $post->id;
        });

        $data = [
            'search_text' => $search_text,
            'except_ids' => collect($except_ids)->all(),
            'posts' => $posts,
        ];

        return view('blog.post.search', $data);
    }
}
