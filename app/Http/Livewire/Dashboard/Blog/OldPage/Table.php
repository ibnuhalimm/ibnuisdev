<?php

namespace App\Http\Livewire\Dashboard\Blog\OldPage;

use App\Models\RedirectOldPage;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    /**
     * Defined properties.
     *
     * @var mixed
     */
    public $search;

    public $is_create_modal_open = 0;
    public $is_delete_modal_open = 0;

    public $db_id;
    public $old_slug;
    public $new_url;

    /**
     * Run form validation after updating properties.
     *
     * @param string $field_name
     * @return void
     */
    public function updated($field_name)
    {
        $this->validateOnly($field_name, $this->formValidationRules(), [], $this->formValidationAttributes());
    }

    /**
     * Open create new modal.
     *
     * @return void
     */
    public function createRedirect()
    {
        $this->is_create_modal_open = 1;
    }

    /**
     * Close modal and reset all field properties.
     *
     * @return void
     */
    public function cancelStore()
    {
        $this->is_create_modal_open = 0;
        $this->reset('db_id', 'old_slug', 'new_url');
    }

    /**
     * Delete, open confirm modal.
     *
     * @param int $db_id
     * @return void
     */
    public function deleteRedirect($db_id)
    {
        $this->db_id = $db_id;
        $this->is_delete_modal_open = 1;
    }

    /**
     * Close delete confirmation modal.
     *
     * @return void
     */
    public function cancelDelete()
    {
        $this->is_delete_modal_open = 0;
        $this->reset('db_id');
    }

    /**
     * Delete data from database.
     *
     * @return void
     */
    public function submitDelete()
    {
        try {
            RedirectOldPage::where('id', $this->db_id)->delete();

            $this->is_delete_modal_open = 0;
            $this->reset('db_id');

            session()->flash('alert-delete-type', 'success');
            session()->flash('alert-delete-message', 'Data deleted!');
        } catch (\Throwable $th) {
            report($th);

            session()->flash('alert-delete-type', 'error');
            session()->flash('alert-delete-message', 'Sorry, something went wrong');
        }
    }

    /**
     * Form validation rules.
     *
     * @return array
     */
    private function formValidationRules()
    {
        return [
            'old_slug' => ['required'],
            'new_url' => ['required', 'url'],
        ];
    }

    /**
     * Form validation attributes.
     *
     * @return array
     */
    private function formValidationAttributes()
    {
        return [
            'old_slug' => 'Old Slug',
            'new_url' => 'New Page URL',
        ];
    }

    /**
     * Store or update new redirect.
     *
     * @return void
     */
    public function storeRedirect()
    {
        $this->validate($this->formValidationRules(), null, $this->formValidationAttributes());

        try {
            RedirectOldPage::create([
                'slug' => trim($this->old_slug),
                'new_url' => trim($this->new_url),
            ]);

            $this->reset('old_slug', 'new_url');
            $this->is_create_modal_open = 0;

            session()->flash('alert-type', 'success');
            session()->flash('alert-message', 'Data saved!');
        } catch (\Throwable $th) {
            report($th);

            session()->flash('alert-type', 'error');
            session()->flash('alert-message', 'Sorry, something went wrong');
        }
    }

    /**
     * Override pagination view to custom view.
     *
     * @return string
     */
    public function paginationView()
    {
        return 'livewire.pagination-tailwindcss';
    }

    /**
     * Render to view.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        $data = [
            'old_pages' => RedirectOldPage::search($this->search)->paginate(20),
        ];

        return view('livewire.dashboard.blog.old-page.table', $data);
    }
}
