<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'total_post' => Post::count(),
            'total_admin' => User::count(),
        ];

        return view('home', $data);
    }
}
