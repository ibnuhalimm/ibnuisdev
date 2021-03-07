<?php

namespace App\Http\Controllers;

use App\Section;
use App\Skill;
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
