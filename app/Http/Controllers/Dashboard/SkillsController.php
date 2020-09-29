<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Show skills page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.skills');
    }
}
