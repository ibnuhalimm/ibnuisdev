<?php

namespace Tests\Unit;

use App\Http\Livewire\FrontEnd\Project;
use App\Project as AppProject;
use Livewire\Livewire;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class PortfolioTest extends TestCase
{
    public $page = 1;
    public $perPage = 8;

    /**
     * Get project list
     *
     * @return mixed
     */
    private function getProjects()
    {
        return AppProject::status(AppProject::STATUS_PUBLISH)
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->paginate($this->perPage, ['*'], null, $this->page);
    }

    /**
     * Portfolio list
     *
     * @return void
     */
    public function testPortfolioList()
    {
        factory(AppProject::class, 10)->create();

        $projects = $this->getProjects();

        Livewire::test(Project::class, [
                'page' => $this->page,
                'perPage' => $this->perPage
            ])
            ->assertSee($projects);
    }
}
