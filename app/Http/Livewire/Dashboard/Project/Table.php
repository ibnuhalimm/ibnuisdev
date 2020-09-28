<?php

namespace App\Http\Livewire\Dashboard\Project;

use App\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    /**
     * Define properties
     *
     * @var mixed
     */
    public $status;
    public $search;

    public $delete_project_id;
    public $is_delete_modal_open = 0;

    /**
     * Open delete confirmation modal
     *
     * @param int $project_id
     * @return void
     */
    public function deleteProject($project_id)
    {
        $this->delete_project_id = $project_id;
        $this->is_delete_modal_open = 1;
    }

    /**
     * Cancel delete, close the modal
     *
     * @return void
     */
    public function cancelDeleteProject()
    {
        $this->is_delete_modal_open = 0;
        $this->reset('delete_project_id');
    }

    /**
     * Delete project from database
     *
     * @return void
     */
    public function submitDeleteProject()
    {
        try {
            Project::destroy($this->delete_project_id);

            $this->is_delete_modal_open = 0;
            $this->reset('delete_project_id');

            session()->flash('alert-delete-status', 'green');
            session()->flash('alert-delete-title', 'Success');
            session()->flash('alert-delete-body', 'Section successfully updated!');

        } catch (\Throwable $th) {
            session()->flash('alert-delete-status', 'red');
            session()->flash('alert-delete-title', 'Error');
            session()->flash('alert-delete-body', 'Oops, something went wrong');

        }
    }

    /**
     * Override pagination view to custom view
     *
     * @return string
     */
    public function paginationView()
    {
        return 'livewire.pagination-tailwindcss';
    }

    /**
     * Render to view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $data = [
            'projects' => Project::orderBy('year', 'desc')
                                ->orderBy('month', 'desc')
                                ->status($this->status)
                                ->searchTable($this->search)
                                ->paginate(10)
        ];

        return view('livewire.dashboard.project.table', $data);
    }
}
