<?php

namespace Tests\Unit\Dashboard\HomePage;

use App\Http\Livewire\Dashboard\Portfolio\Table;
use App\Models\Project;
use Livewire\Livewire;
use Tests\TestCase;

class PortfolioTableTest extends TestCase
{
    /**
     * Show delete confirmation modal.
     *
     * @return void
     */
    public function test_show_delete_confirmation_modal()
    {
        $project = Project::factory()->create();

        Livewire::test(Table::class)
            ->call('deleteProject', $project->id)
            ->assertSet('delete_project_id', $project->id)
            ->assertSet('is_delete_modal_open', 1);
    }

    /**
     * Hide delete confirmation modal
     * if user tap to cancel button.
     *
     * @return void
     */
    public function test_hide_delete_confirmation_modal_if_cancel()
    {
        Livewire::test(Table::class)
            ->assertSet('delete_project_id', null)
            ->assertSet('is_delete_modal_open', 0);
    }

    /**
     * Can delete project.
     *
     * @return void
     */
    public function test_can_delete_project()
    {
        $project = Project::factory()->create();

        Livewire::test(Table::class)
            ->set('delete_project_id', $project->id)
            ->call('submitDeleteProject')
            ->assertSet('is_delete_modal_open', 0)
            ->assertSet('delete_project_id', null);
    }
}
