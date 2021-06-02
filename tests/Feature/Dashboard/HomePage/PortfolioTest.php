<?php

namespace Tests\Feature\Dashboard\HomePage;

use App\Models\Project;
use App\Models\User;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    /**
     * Set logged in user.
     *
     * @return void
     */
    private function setLoggedInUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    /**
     * Show portfolio table page.
     *
     * @return void
     */
    public function test_admin_can_view_portfolio_table_page()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.portfolio.index'));
        $response->assertStatus(200)
            ->assertViewIs('dashboard.portfolio.index');
    }

    /**
     * Contains portfolio.table livewire component.
     *
     * @return void
     */
    public function test_contains_portolio_table_livewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.portfolio.index'));
        $response->assertSeeLivewire('dashboard.portfolio.table');
    }

    /**
     * Can show portfolio create page.
     *
     * @return void
     */
    public function test_can_show_create_page()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.portfolio.create'));
        $response->assertStatus(200)
            ->assertViewIs('dashboard.portfolio.create');
    }

    /**
     * Create page contains dashboard.portfolio.create livewire.
     *
     * @return void
     */
    public function test_create_page_contains_portfolio_create_livewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.portfolio.create'));
        $response->assertSeeLivewire('dashboard.portfolio.create');
    }

    /**
     * Can show portfolio edit page.
     *
     * @return void
     */
    public function test_can_show_edit_page()
    {
        $this->setLoggedInUser();

        $project = Project::factory()->create();

        $response = $this->get(route('dashboard.portfolio.edit', ['id' => $project->id]));
        $response->assertStatus(200)
            ->assertViewIs('dashboard.portfolio.edit');
    }

    /**
     * Edit page contains dashboard.portfolio.edit livewire.
     *
     * @return void
     */
    public function test_edit_page_contains_portfolio_edit_livewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.portfolio.create'));
        $response->assertSeeLivewire('dashboard.portfolio.create');
    }
}
