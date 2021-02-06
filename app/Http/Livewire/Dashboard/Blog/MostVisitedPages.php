<?php

namespace App\Http\Livewire\Dashboard\Blog;

use App\Models\Blog\Analytics;
use Illuminate\Support\Collection;
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

        $data = [
            'pages' => isset($analytics->data) ? collect(json_decode($analytics->data)) : new Collection()
        ];

        return view('livewire.dashboard.blog.most-visited-pages', $data);
    }
}
