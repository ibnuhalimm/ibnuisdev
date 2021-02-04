<?php

namespace Tests\Feature\Dashboard\HomePage;

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
}
