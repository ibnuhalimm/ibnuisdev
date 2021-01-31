<?php

namespace App\Http\Livewire\Dashboard\Blog\Post;

use App\Models\Blog\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    /**
     * Define all public properties
     *
     * @var mixed
     */
    public $status;
    public $search;

    /**
     * Reset pagination while applying filter
     *
     * @return void
     */
    public function updating()
    {
        $this->resetPage();
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
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        $data = [
            'posts' => Post::orderBy('created_at', 'desc')
                            ->status($this->status)
                            ->searchTable($this->search)
                            ->paginate(20)
        ];

        return view('livewire.dashboard.blog.post.table', $data);
    }
}
