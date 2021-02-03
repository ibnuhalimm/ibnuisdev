<?php

namespace Tests\Feature;

use App\Section;
use App\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * Status code of home page should 200
     *
     * @return void
     */
    public function testStatusCodeShouldOk()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Home page view should
     *
     * @return void
     */
    public function testUseRightViewFile()
    {
        $response = $this->get('/');

        $response->assertViewIs('index');
    }

    /**
     * Home page should has top page section data
     *
     * @return void
     */
    public function testHasTopSectionData()
    {
        $top_section = Section::create([
            'section' => Section::SECTION_TOP,
            'description' => 'This is top section.'
        ]);

        $response = $this->get('/');
        $response->assertViewHas('top', $top_section);
    }

    /**
     * Home page should has `portfolio` section data
     *
     * @return void
     */
    public function testHasPortfolioSectionData()
    {
        $portfolio = Section::create([
            'section' => Section::SECTION_PORTFOLIO,
            'description' => 'This is portfolio.'
        ]);

        $response = $this->get('/');
        $response->assertViewHas('portfolio', $portfolio);
    }

    /**
     * Home page should has `skills` section data
     *
     * @return void
     */
    public function testHasSkillsSectionData()
    {
        $skills = Section::create([
            'section' => Section::SECTION_SKILLS,
            'description' => 'This is skills.'
        ]);

        $response = $this->get('/');
        $response->assertViewHas('skills', $skills);
    }

    /**
     * Home page should has `skills_list` data
     *
     * @return void
     */
    public function testHasSkillsListData()
    {
        factory(Skill::class)->create();
        $skill_list = Skill::orderBy('order_number', 'asc')->orderBy('name', 'asc')->get();

        $response = $this->get('/');
        $response->assertViewHas('skill_list', $skill_list);
    }

    /**
     * Home page should has `contact` section data
     *
     * @return void
     */
    public function testHasContactSectionData()
    {
        $contact = Section::create([
            'section' => Section::SECTION_CONTACT,
            'description' => 'This is contact.'
        ]);

        $response = $this->get('/');
        $response->assertViewHas('contact', $contact);
    }
}
