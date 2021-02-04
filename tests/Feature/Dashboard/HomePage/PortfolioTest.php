<?php

namespace Tests\Feature\Dashboard\HomePage;

use App\Project;
use App\User;
use Tests\TestCase;

class PortfolioTest extends TestCase
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
     * Show portfolio table page
     *
     * @return void
     */
    public function testAdminCanViewPortfolioTablePage()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.portfolio.index'));
        $response->assertStatus(200)
            ->assertViewIs('dashboard.portfolio.index');
    }

    /**
     * Contains portfolio.table livewire component
     *
     * @return void
     */
    public function testContainsPortolioTableLivewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.portfolio.index'));
        $response->assertSeeLivewire('dashboard.portfolio.table');
    }

    /**
     * Can show portfolio create page
     *
     * @return void
     */
    public function testCanShowCreatePage()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.portfolio.create'));
        $response->assertStatus(200)
            ->assertViewIs('dashboard.portfolio.create');
    }

    /**
     * Create page contains dashboard.portfolio.create livewire
     *
     * @return void
     */
    public function testCreatePageContainsPortfolioCreateLivewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.portfolio.create'));
        $response->assertSeeLivewire('dashboard.portfolio.create');
    }

    /**
     * Can show portfolio edit page
     *
     * @return void
     */
    public function testCanShowEditPage()
    {
        $this->setLoggedInUser();

        $project = factory(Project::class)->create();

        $response = $this->get(route('dashboard.portfolio.edit', [ 'id' => $project->id ]));
        $response->assertStatus(200)
            ->assertViewIs('dashboard.portfolio.edit');
    }

    /**
     * Edit page contains dashboard.portfolio.edit livewire
     *
     * @return void
     */
    public function testEditPageContainsPortfolioEditLivewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.portfolio.create'));
        $response->assertSeeLivewire('dashboard.portfolio.create');
    }
}
