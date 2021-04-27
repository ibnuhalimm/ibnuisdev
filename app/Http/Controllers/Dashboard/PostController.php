<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use App\Traits\StoreImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use StoreImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.blog.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.post.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $data = [
            'post' => $post
        ];

        return view('dashboard.blog.post.edit', $data);
    }

    /**
     * Image upload for tinymce on postingan
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function uploadImageCkeditor(Request $request)
    {
        if ($request->hasFile('file')) {
            $file_extension = $request->file('file')->getClientOriginalExtension();

            if ($file_extension === 'gif') {
                $saveAsFileName = Str::random(30) . '_' . time() . '.' . $file_extension;

                $file_path = Storage::putFileAs(
                    'public/post-images', $request->file('file'), $saveAsFileName
                );
            }
            else {
                $store_image = $this->storeAndCompressImage($request, 'file', 'post-images');
                $file_path = $store_image['uploaded_image'];
            }

            return response()->json([
                'location' => Storage::url($file_path)
            ]);
        }
    }
}
