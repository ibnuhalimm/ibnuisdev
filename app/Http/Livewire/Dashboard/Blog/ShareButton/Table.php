<?php

namespace App\Http\Livewire\Dashboard\Blog\ShareButton;

use App\Models\Blog\ShareButton;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    /**
     * Defined properties
     *
     * @var mixed
     */
    public $search;

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
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        $data = [
            'share_buttons' => ShareButton::orderBy('nomor_urut', 'asc')
                                        ->where('nama', 'like', '%' . $this->search . '%')
                                        ->paginate(10)
        ];

        return view('livewire.dashboard.blog.share-button.table', $data);
    }
}
