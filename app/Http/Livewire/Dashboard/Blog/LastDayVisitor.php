<?php

namespace App\Http\Livewire\Dashboard\Blog;

use App\Models\Blog\Analytics;
use Livewire\Component;

class LastDayVisitor extends Component
{
    public $total_visitor_today = 0;

    /**
     * Initialize properties
     *
     * @return void
     */
    public function mount()
    {
        $total_visitor_today = Analytics::where('name', Analytics::LAST_DAY_TOTAL_VISITOR)->first();
        $this->total_visitor_today = isset($total_visitor_today->data) ? $total_visitor_today->data : 0;
    }

    /**
     * Render to view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.dashboard.blog.last-day-visitor');
    }
}
