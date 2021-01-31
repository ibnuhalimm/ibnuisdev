<?php

namespace App\Http\Livewire\Blog\Post;

use Livewire\Component;
use Livewire\WithPagination;

class LatestPost extends Component
{
    use WithPagination;

    /**
     * Define all properties
     *
     * @var mixed
     */
    public $except_ids;

    /**
     * Initialize properties data
     *
     * @return void
     */
    public function mount($except_ids)
    {
        $this->except_ids = $except_ids;
    }

    /**
     * Override pagination view
     *
     * @return string
     */
    public function paginationView()
    {
        return 'livewire.blog.pagination-latest-post';
    }

    /**
     * Render to view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.blog.post.latest-post');
    }
}
