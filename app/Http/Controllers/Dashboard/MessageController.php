<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Show message page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.message');
    }
}
