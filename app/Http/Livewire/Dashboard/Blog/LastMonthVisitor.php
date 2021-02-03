<?php

namespace App\Http\Livewire\Dashboard\Blog;

use App\Models\Blog\Analytics;
use Livewire\Component;

class LastMonthVisitor extends Component
{
    public $total_visitor_month = 0;

    /**
     * Initialize properties
     *
     * @return void
     */
    public function mount()
    {
        $visitor_month = Analytics::where('name', Analytics::LAST_MONTH_TOTAL_VISITOR)->first();
        $this->total_visitor_month = isset($visitor_month->data) ? $visitor_month->data : 0;
    }

    /**
     * Render to view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.dashboard.blog.last-month-visitor');
    }
}
