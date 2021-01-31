<?php

namespace App\Http\Livewire\Dashboard\Blog;

use App\Models\Blog\Analytics;
use Livewire\Component;

class MostVisitedPages extends Component
{
    /**
     * Define properties
     *
     * @var mixed
     */
    public $days;

    /**
     * Initialize properties data
     *
     * @return array
     */
    public function mount($days)
    {
        $this->days = $days;
    }

    /**
     * Render to view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $analytics = Analytics::where('name', Analytics::MOST_VISITED_PAGES . '-' . $this->days . '-days')->first();
        $pages = isset($analytics->data) ? $analytics->data : '';

        $pages = collect(json_decode($pages));

        $data  = [
            'pages' => $pages
        ];

        return view('livewire.dashboard.blog.most-visited-pages', $data);
    }
}
