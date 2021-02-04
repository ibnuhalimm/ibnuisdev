<?php

namespace Tests\Unit;

use App\Http\Livewire\FrontEnd\Project;
use Livewire\Livewire;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    /**
     * Test can initialize value of properties
     * - page
     * - perPage
     *
     * @return void
     */
    public function testCanSetInitialPageAndPerPage()
    {
        $page = 1;
        $perPage = 8;

        Livewire::test(Project::class, [
                'page' => $page,
                'perPage' => $perPage
            ])
            ->assertSet('page', $page)
            ->assertSet('perPage', $perPage);
    }
}
