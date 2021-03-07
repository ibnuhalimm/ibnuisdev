<?php

namespace App\Http\Controllers;

use App\Section;
use App\Skill;
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

        $skill_list = Skill::orderBy('order_number', 'asc')->orderBy('name', 'asc')->get();

        $data = [
            'top' => $top,
            'portfolio' => $portfolio,
            'skills' => $skills,
            'contact' => $contact,
            'skill_list' => $skill_list
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
}
