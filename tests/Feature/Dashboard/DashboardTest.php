<?php

namespace Tests\Feature\Dashboard;

use App\User;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * Set logged in user
     *
     * @return void
     */
    private function setLoggedInUser()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    /**
     * Admin can view dashboard page
     *
     * @return void
     */
    public function testAdminCanViewDashboardPage()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('home'));
        $response->assertStatus(200)
            ->assertViewIs('home');
    }

    /**
     * Contains last-day-visitor livewire component
     *
     * @return void
     */
    public function testContainsLastDayVisitorLivewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('home'));
        $response->assertSeeLivewire('dashboard.blog.last-day-visitor');
    }

    /**
     * Contains last-month-visitor livewire component
     *
     * @return void
     */
    public function testContainsLastMonthVisitorLivewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('home'));
        $response->assertSeeLivewire('dashboard.blog.last-month-visitor');
    }

    /**
     * Contains most-visited-pages livewire component
     *
     * @return void
     */
    public function testContainsMostVisitedPagesLivewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('home'));
        $response->assertSeeLivewire('dashboard.blog.most-visited-pages');
    }
}
