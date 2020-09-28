<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show landing page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }
}
