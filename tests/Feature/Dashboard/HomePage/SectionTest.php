<?php

namespace Tests\Feature\Dashboard\HomePage;

use App\User;
use Tests\TestCase;

class SectionTest extends TestCase
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
     * Admin can view section management page
     *
     * @return void
     */
    public function testAdminCanViewSectionManagementPage()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.section.index'));
        $response->assertStatus(200)
            ->assertViewIs('dashboard.section');
    }

    /**
     * Contains section table livewire component
     *
     * @return void
     */
    public function testContainsSectionTableLivewire()
    {
        $this->setLoggedInUser();

        $response = $this->get(route('dashboard.section.index'));
        $response->assertSeeLivewire('dashboard.section.table');
    }
}
