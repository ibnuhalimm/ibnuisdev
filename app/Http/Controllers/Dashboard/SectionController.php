<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Show section page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.section');
    }
}
