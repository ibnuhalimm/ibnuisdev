<?php

namespace App\Http\Livewire\Dashboard\Project;

use App\Project;
use App\Traits\LivewireOptimizeImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads, LivewireOptimizeImage;

    /**
     * Define all properties
     *
     * @var mixed
     */
    public $project_id;
    public $month;
    public $year;
    public $name;
    public $image;
    public $image_url;
    public $description;
    public $link;
    public $status;

    /**
     * Initial properties value
     *
     * @param \App\Project $project
     * @return void
     */
    public function mount($project)
    {
        $this->project_id = $project->id;
        $this->month = ($project->month < 10) ? '0' . $project->month : $project->month;
        $this->year = $project->year;
        $this->image = $project->image;
        $this->image_url = $project->image_url;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->link = $project->link;
        $this->status = $project->status;
    }

    /**
     * Event after updating `img` property
     *
     * @return void
     */
    public function updatedImage()
    {
        $this->optimizeImage($this->image, 600, 400);
        $this->image_url = $this->image->temporaryUrl();
    }

    /**
     * Form validation rules
     *
     * @return array
     */
    private function formValidationRules()
    {
        return [
            'month' => [ 'required', 'between:01,12' ],
            'year' => [ 'required', 'digits:4' ],
            'name' => [ 'required', 'min:10', 'max:50' ],
            'description' => [ 'required', 'min:100', 'max:300' ],
            'link' => [ 'nullable', 'url' ],
            'status' => [ 'required', 'in:' . Project::STATUS_DRAFT . ',' . Project::STATUS_PUBLISH ]
        ];
    }

    /**
     * Run realtime form validation
     *
     * @param string $property_name
     * @return void
     */
    public function updated($property_name)
    {
        $this->validateOnly($property_name, $this->formValidationRules());
    }

    /**
     * Update project to database
     *
     * @return \Illuminate\Http\Response
     */
    public function submitUpdateProject()
    {
        $this->validate($this->formValidationRules());

        try {

            $image = $this->image;
            if (is_string($this->image) === false) {
                Storage::disk('public')->delete($this->image);

                $image = $this->image->store('project', 'public');
            }

            Project::where('id', $this->project_id)
                ->update([
                    'month' => $this->month,
                    'year' => $this->year,
                    'name' => $this->name,
                    'image' => $image,
                    'description' => $this->description,
                    'link' => $this->link,
                    'status' => $this->status
                ]);

            session()->flash('alert-create-status', 'green');
            session()->flash('alert-create-title', 'Success');
            session()->flash('alert-create-body', 'Project updated!');

            return redirect()->route('dashboard.project.index');

        } catch (\Throwable $th) {
            session()->flash('alert-create-status', 'red');
            session()->flash('alert-create-title', 'Error');
            session()->flash('alert-create-body', 'Oops, something went wrong');

            return;
        }
    }

    /**
     * Render to view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.dashboard.project.edit');
    }
}
