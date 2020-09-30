<?php

namespace App\Http\Livewire\Dashboard\Skills;

use App\Skill;
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
    public $search;

    public $skill_id;
    public $name;
    public $order_number;

    public $is_edit_mode;
    public $is_create_modal_open = 0;
    public $is_edit_modal_open = 0;
    public $is_delete_modal_open = 0;

    /**
     * Form validation rules
     *
     * @return array
     */
    private function formValidationRules()
    {
        return [
            'name' => [ 'required', 'string', 'min:3', 'max:20' ],
            'order_number' => [ 'required', 'numeric' ]
        ];
    }

    /**
     * Realtime form validation
     *
     * @param string $property_name
     * @return void
     */
    public function updated($property_name)
    {
        $this->validateOnly($property_name, $this->formValidationRules());
    }

    /**
     * Open new skill modal
     *
     * @return void
     */
    public function createSkill()
    {
        $this->is_edit_mode = false;
        $this->is_create_modal_open = 1;
    }

    /**
     * Cancel save new skill,
     * close the modal
     *
     * @return void
     */
    public function cancelCreateSkill()
    {
        $this->is_create_modal_open = 0;
        $this->reset('name', 'order_number');
    }

    /**
     * Store skill to database
     *
     * @return void
     */
    public function submitCreateSkill()
    {
        $this->validate($this->formValidationRules());

        try {
            Skill::updateOrCreate(
                [ 'name' => $this->name ],
                [
                    'name' => $this->name,
                    'order_number' => $this->order_number
                ]
            );

            $this->is_create_modal_open = 0;
            $this->reset('name', 'order_number');

            session()->flash('alert-status', 'green');
            session()->flash('alert-title', 'Success');
            session()->flash('alert-body', 'New skill saved!');

        } catch (\Throwable $th) {
            session()->flash('alert-create-status', 'red');
            session()->flash('alert-create-title', 'Error');
            session()->flash('alert-create-body', 'Something went wrong');

        }
    }

    /**
     * Edit skill
     * Get data and open the edit modal
     *
     * @param int $skill_id
     * @return void
     */
    public function editSkill($skill_id)
    {
        $skill = Skill::findOrFail($skill_id);

        $this->is_edit_mode = true;
        $this->skill_id = $skill_id;
        $this->name = $skill->name;
        $this->order_number = $skill->order_number;
        $this->is_edit_modal_open = 1;
    }

    /**
     * Cancel Update skill,
     * close the modal
     *
     * @return void
     */
    public function cancelEditSkill()
    {
        $this->is_edit_modal_open = 0;
        $this->reset('name', 'order_number');
    }

    /**
     * Update skill on database
     *
     * @return void
     */
    public function submitEditSkill()
    {
        $this->validate($this->formValidationRules());

        try {
            Skill::where('id', $this->skill_id)
                    ->update([
                        'name' => $this->name,
                        'order_number' => $this->order_number
                    ]);

            $this->is_edit_modal_open = 0;
            $this->reset('skill_id', 'name', 'order_number');

            session()->flash('alert-status', 'green');
            session()->flash('alert-title', 'Success');
            session()->flash('alert-body', 'Skill data updated!');

        } catch (\Throwable $th) {
            session()->flash('alert-edit-status', 'red');
            session()->flash('alert-edit-title', 'Error');
            session()->flash('alert-edit-body', 'Something went wrong');

        }
    }

    /**
     * Open delete skill confirm modal
     *
     * @param int $skill_id
     * @return void
     */
    public function deleteskill($skill_id)
    {
        $this->skill_id = $skill_id;
        $this->is_delete_modal_open = 1;
    }

    /**
     * Cancel delete skill,
     * close the modal
     *
     * @return void
     */
    public function cancelDeleteSkill()
    {
        $this->is_delete_modal_open = 0;
        $this->reset('skill_id');
    }

    /**
     * Delete skill from database
     *
     * @return void
     */
    public function submitDeleteSkill()
    {
        try {
            Skill::destroy($this->skill_id);

            $this->is_delete_modal_open = 0;
            $this->reset('skill_id');

            session()->flash('alert-status', 'green');
            session()->flash('alert-title', 'Success');
            session()->flash('alert-body', 'Skill data deleted!');

        } catch (\Throwable $th) {
            session()->flash('alert-delete-status', 'red');
            session()->flash('alert-delete-title', 'Error');
            session()->flash('alert-delete-body', 'Something went wrong');

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
            'skills' => Skill::orderBy('order_number', 'asc')->searchTable($this->search)->paginate(20)
        ];

        return view('livewire.dashboard.skills.table', $data);
    }
}
