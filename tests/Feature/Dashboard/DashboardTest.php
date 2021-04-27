<?php

namespace Tests\Feature\Dashboard;

use App\Models\User;
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
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    /**
     * Admin can view dashboard page
     *
     * @return void
     */
    public function test_admin_can_view_dashboard_page()
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
    public function test_contains_last_day_visitor_livewire()
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
    public function test_contains_last_month_visitor_livewire()
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
    public function test_contains_most_visited_pages_livewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('home'));
        $response->assertSeeLivewire('dashboard.blog.most-visited-pages');
    }
}
