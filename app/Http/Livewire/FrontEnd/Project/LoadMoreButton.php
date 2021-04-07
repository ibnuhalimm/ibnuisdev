<?php

namespace App\Http\Livewire\FrontEnd\Project;

use App\Models\Project;
use Livewire\Component;

class LoadMoreButton extends Component
{
    public $page;
    public $perPage;
    public $loadMore;

    public function mount($page = 1, $perPage = 1)
    {
        $this->page = $page + 1;
        $this->perPage = $perPage;
        $this->loadMore = false;
    }

    public function loadMore()
    {
        $this->loadMore = true;
    }

    public function render()
    {
        if ($this->loadMore) {
            $data = [
                'projects' => Project::status(Project::STATUS_PUBLISH)
                                        ->orderBy('year', 'desc')
                                        ->orderBy('month', 'desc')
                                        ->paginate($this->perPage, ['*'], null, $this->page)
            ];

            return view('livewire.front-end.project', $data);
        }

        return view('livewire.front-end.project.load-more-button');
    }
}
