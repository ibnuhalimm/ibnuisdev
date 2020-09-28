<?php

namespace App\Http\Livewire\Dashboard\Section;

use App\Section;
use Livewire\Component;

class Table extends Component
{
    public $is_edit_modal_open = 0;
    public $edit_section_id;
    public $edit_section;
    public $edit_description;

    /**
     * Edit section, open the edit modal
     *
     * @param int $section_id
     * @return void
     */
    public function editSection($section_id)
    {
        $section = Section::findOrFail($section_id);

        $this->edit_section_id = $section->id;
        $this->edit_section = $section->section;
        $this->edit_description = $section->description;
        $this->is_edit_modal_open = 1;
    }

    /**
     * Form validation rules
     *
     * @return array
     */
    protected function formValidationRules()
    {
        return [
            'edit_section' => [
                'required',
                'in:' . Section::SECTION_TOP . ',' . Section::SECTION_PORTFOLIO . ',' . Section::SECTION_SKILLS . ',' . Section::SECTION_CONTACT
            ],
            'edit_description' => [ 'required', 'string', 'min:10' ]
        ];
    }

    /**
     * Form validation attributes
     *
     * @return array
     */
    protected function formValidationAttributes()
    {
        return [
            'edit_section' => 'Section',
            'edit_description' => 'Description'
        ];
    }

    /**
     * Run realtime validation
     *
     * @param string $property_name
     * @return void
     */
    public function updated($property_name)
    {
        $this->validateOnly($property_name, $this->formValidationRules(), [], $this->formValidationAttributes());
    }

    /**
     * Cancel edit, close the modal
     *
     * @return void
     */
    public function cancelEditSection()
    {
        $this->is_edit_modal_open = 0;
        $this->reset('edit_section_id', 'edit_section', 'edit_description');
    }

    /**
     * Cancel edit, close the modal
     *
     * @return void
     */
    public function submitEditSection()
    {
        $this->validate($this->formValidationRules(), [], $this->formValidationAttributes());

        try {
            Section::where('id', $this->edit_section_id)
                    ->update([
                        'description' => $this->edit_description
                    ]);

            $this->is_edit_modal_open = 0;
            $this->reset('edit_section_id', 'edit_section', 'edit_description');

            session()->flash('alert-edit-status', 'green');
            session()->flash('alert-edit-title', 'Success');
            session()->flash('alert-edit-body', 'Section successfully updated!');

        } catch (\Throwable $th) {
            session()->flash('alert-edit-status', 'red');
            session()->flash('alert-edit-title', 'Error');
            session()->flash('alert-edit-body', 'Oops, something went wrong');

        }
    }

    /**
     * Render to view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $data = [
            'sections' => Section::orderBy('section', 'asc')->get()
        ];

        return view('livewire.dashboard.section.table', $data);
    }
}
