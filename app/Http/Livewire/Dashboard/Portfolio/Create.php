<?php

namespace App\Http\Livewire\Dashboard\Portfolio;

use App\Project;
use App\Traits\LivewireOptimizeImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, LivewireOptimizeImage;

    /**
     * Define all properties
     *
     * @var mixed
     */
    public $lang;
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
     * @return void
     */
    public function mount()
    {
        $this->lang = 'id';
        $this->month = date('m');
        $this->year = date('Y');
        $this->image_url = asset('img/no_image.jpg');
        $this->status = Project::STATUS_DRAFT;
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
            'lang' => [ 'required', 'in:id,en' ],
            'month' => [ 'required', 'between:01,12' ],
            'year' => [ 'required', 'digits:4' ],
            'name' => [ 'required', 'min:10', 'max:50' ],
            'image' => [ 'required', 'image', 'mimes:jpg,jpeg,png' ],
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
     * Storing project to database
     *
     * @return \Illuminate\Http\Response
     */
    public function submitCreateProject()
    {
        $this->validate($this->formValidationRules());

        try {
            Project::create([
                'lang' => $this->lang,
                'month' => $this->month,
                'year' => $this->year,
                'name' => $this->name,
                'image' => $this->image->store('project', 'public'),
                'description' => $this->description,
                'link' => $this->link,
                'status' => $this->status
            ]);

            session()->flash('alert-create-status', 'green');
            session()->flash('alert-create-title', 'Success');
            session()->flash('alert-create-body', 'Portfolio saved!');

            return redirect()->route('dashboard.portfolio.index');

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
        return view('livewire.dashboard.portfolio.create');
    }
}
