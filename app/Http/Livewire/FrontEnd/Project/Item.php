<?php

namespace App\Http\Livewire\FrontEnd\Project;

use Livewire\Component;

class Item extends Component
{
    public $name;
    public $description;
    public $image_url;
    public $link;
    public $page;

    public function mount($project, $page)
    {
        $this->name = $project->name;
        $this->description = $project->description;
        $this->image_url = $project->image_url;
        $this->link = $project->link;
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.front-end.project.item');
    }
}
