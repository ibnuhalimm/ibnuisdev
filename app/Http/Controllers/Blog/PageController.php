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
     * Show home page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_posts = Post::mainPostOnHome();
        $main_posts_ids = collect($main_posts)->map(function($post) {
            return $post['id'];
        });

        $top_posts = Post::getTopPostNotInMain($main_posts_ids);
        $top_posts_ids = collect($top_posts)->map(function($post) {
            return $post->id;
        });

        $except_ids = $main_posts_ids->concat($top_posts_ids)->all();

        $data = [
            'main_posts' => $main_posts,
            'top_posts' => $top_posts,
            'except_ids' => $except_ids
        ];

        return view('blog.index', $data);
    }

    /**
     * Read post page
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

        abort_if(!$post, 404);

        PostVisitor::storePostVisitor($post->id);

        $data = [
            'post' => $post,
            'share_buttons' => ShareButton::orderBy('nomor_urut')->get(),
            'related_posts' => Post::published()->relatedPosts($post->tag)->take(3)->get()
        ];

        return view('blog.post.read', $data);
    }

    /**
     * Searching post
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

        $except_ids = collect($posts)->map(function($post) {
            return $post->id;
        });

        $data = [
            'search_text' => $search_text,
            'except_ids' => collect($except_ids)->all(),
            'posts' => $posts
        ];

        return view('blog.post.search', $data);
    }
}
