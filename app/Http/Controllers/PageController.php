<?php

namespace App\Http\Controllers;

use App\Project;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Show landing page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'latest_posts' => Post::published()->latest()->take(6)->get(),
            'projects' => Project::orderBy('year', 'desc')->orderBy('month', 'desc')->published()->take(6)->get()
        ];

        return view('index', $data);
    }

    /**
     * Show portfolio page
     *
     * @return \Illuminate\View\View
     */
    public function portfolio()
    {
        return view('portfolio');
    }

    /**
     * Show resume page
     *
     * @return \Illuminate\View\View
     */
    public function resume()
    {
        return view('resume');
    }

    /**
     * Show contact-me page
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Change lang to id
     *
     * @return \Illuminate\Http\Response
     */
    public function changeLangeToId()
    {
        $this->langChanger('id');

        return redirect()->back();
    }

    /**
     * Change lang to en
     *
     * @return \Illuminate\Http\Response
     */
    public function changeLangeToEn()
    {
        $this->langChanger('en');

        return redirect()->back();
    }

    /**
     * Change the language / locale
     *
     * @param string $locale
     * @return void
     */
    private function langChanger($locale)
    {
        $available_langs = ['en', 'id'];
        if (in_array($locale, $available_langs)) {
            Session::put('app_locale', $locale);
        }
    }
}
