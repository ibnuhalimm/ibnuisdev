<?php

namespace App\Http\Livewire\FrontEnd;

use App\Project as AppProject;
use Livewire\Component;

class Project extends Component
{
    public $page;
    public $perPage;

    public function mount($page, $perPage)
    {
        $this->page = $page ? $page : 1;
        $this->perPage = $perPage ? $perPage : 1;
    }

    public function render()
    {
        $data = [
            'projects' => AppProject::status(AppProject::STATUS_PUBLISH)
                                    ->orderBy('year', 'desc')
                                    ->orderBy('month', 'desc')
                                    ->paginate($this->perPage, ['*'], null, $this->page)
        ];

        return view('livewire.front-end.project', $data);
    }
}
