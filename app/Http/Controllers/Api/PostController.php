<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use ApiResponser;

    /**
     * Get latest posts
     *
     * @return \Illuminate\Http\Response
     */
    public function getLatestPosts(Request $request)
    {
        $last_id = $request->lastId;
        $except_ids = $request->exceptIds;

        if ($last_id == 0) {
            $posts = Post::published()
                        ->orderBy('id', 'desc')
                        ->whereNotIn('id', $except_ids)
                        ->take(13)
                        ->get();
        }
        else {
            $posts = Post::published()
                ->orderBy('id', 'desc')
                ->where('id', '<', $last_id)
                ->whereNotIn('id', $except_ids)
                ->take(13)
                ->get();
        }


        $posts_result = $posts->map(function($post) {
            return [
                'id' => $post->id,
                'title' => $post->judul,
                'image_url' => $post->gbr_url,
                'post_url' => $post->post_url,
                'preview_body' => Str::limit(clear_body_post($post->isi), 100, '...'),
                'created_at' => $post->created_at
            ];
        });


        $post_last_id = -1;
        $posts_data = $posts_result;
        if ($posts_result->count() == 13) {
            $posts_data = $posts_result->take(12);
            $post_last_id = $posts_data->map(function($post) {
                return $post['id'];
            })->last();
        }

        $status = 200;
        $message = 'Success';
        $data = [
            'lastId' => $post_last_id,
            'posts' => $posts_data
        ];

        return $this->apiResponse($status, $message, $data);
    }
}
