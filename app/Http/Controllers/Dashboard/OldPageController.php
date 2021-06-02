<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OldPageController extends Controller
{
    /**
     * Show `redirect_old_pages` CRUD page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.blog.old_page.index');
    }
}
