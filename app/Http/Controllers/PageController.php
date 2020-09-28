<?php

namespace App\Http\Controllers;

use App\Section;
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
        $top = Section::where('section', Section::SECTION_TOP)->first();
        $portfolio = Section::where('section', Section::SECTION_PORTFOLIO)->first();
        $skills = Section::where('section', Section::SECTION_SKILLS)->first();
        $contact = Section::where('section', Section::SECTION_CONTACT)->first();

        $data = [
            'top' => $top,
            'portfolio' => $portfolio,
            'skills' => $skills,
            'contact' => $contact
        ];

        return view('index', $data);
    }
}
