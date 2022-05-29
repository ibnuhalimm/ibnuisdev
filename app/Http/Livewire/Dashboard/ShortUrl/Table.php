<?php

namespace App\Http\Livewire\Dashboard\ShortUrl;

use App\Models\ShortUrl;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search;

    public $is_create_modal_open = 0;
    public $is_delete_modal_open = 0;

    public $db_id;
    public $origin;
    public $short_id;


    public function updated($field_name)
    {
        $this->validateOnly($field_name, $this->formValidationRules(), [], $this->formValidationAttributes());
    }


    public function createShortUrl()
    {
        $this->is_create_modal_open = 1;
        $this->short_id = ShortUrl::uniqueShortId();
    }


    public function cancelStore()
    {
        $this->is_create_modal_open = 0;
        $this->reset('db_id', 'origin', 'short_id');
    }


    public function deleteShortUrl($db_id)
    {
        $this->db_id = $db_id;
        $this->is_delete_modal_open = 1;
    }


    public function cancelDelete()
    {
        $this->is_delete_modal_open = 0;
        $this->reset('db_id');
    }


    public function submitDelete()
    {
        try {
            ShortUrl::where('id', $this->db_id)->delete();

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


    private function formValidationRules()
    {
        return [
            'origin' => [
                'required',
                'url'
            ],
            'short_id' => [
                'required',
                'unique:' . (new ShortUrl())->getTable() . ',short_id'
            ],
        ];
    }


    private function formValidationAttributes()
    {
        return [
            'origin' => 'Long URL',
            'short_id' => 'Short ID',
        ];
    }


    public function storeRedirect()
    {
        $this->validate($this->formValidationRules(), null, $this->formValidationAttributes());

        try {
            ShortUrl::create([
                'origin' => trim($this->origin),
                'short_id' => trim($this->short_id),
            ]);

            $this->reset('origin', 'short_id');
            $this->is_create_modal_open = 0;

            session()->flash('alert-type', 'success');
            session()->flash('alert-message', 'Data saved!');
        } catch (\Throwable $th) {
            report($th);

            session()->flash('alert-type', 'error');
            session()->flash('alert-message', 'Sorry, something went wrong');
        }
    }


    public function paginationView()
    {
        return 'livewire.pagination-tailwindcss';
    }


    public function render()
    {
        $data = [
            'shortUrls' => ShortUrl::search($this->search)->paginate(20),
        ];

        return view('livewire.dashboard.short-url.table', $data);
    }
}
