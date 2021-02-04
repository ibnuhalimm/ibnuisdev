<?php

namespace Tests\Unit\Dashboard\HomePage;

use App\Http\Livewire\Dashboard\Portfolio\Table;
use App\Project;
use Livewire\Livewire;
use Tests\TestCase;

class PortfolioTableTest extends TestCase
{
    /**
     * Show delete confirmation modal
     *
     * @return void
     */
    public function testShowDeleteConfirmationModal()
    {
        $project = factory(Project::class)->create();

        Livewire::test(Table::class)
            ->call('deleteProject', $project->id)
            ->assertSet('delete_project_id', $project->id)
            ->assertSet('is_delete_modal_open', 1);
    }

    /**
     * Hide delete confirmation modal
     * if user tap to cancel button
     *
     * @return void
     */
    public function testHideDeleteConfirmationModalIfCancel()
    {
        Livewire::test(Table::class)
            ->assertSet('delete_project_id', null)
            ->assertSet('is_delete_modal_open', 0);
    }

    /**
     * Can delete project
     *
     * @return void
     */
    public function testCanDeleteProject()
    {
        $project = factory(Project::class)->create();

        Livewire::test(Table::class)
            ->set('delete_project_id', $project->id)
            ->call('submitDeleteProject')
            ->assertSet('is_delete_modal_open', 0)
            ->assertSet('delete_project_id', null);
    }
}
