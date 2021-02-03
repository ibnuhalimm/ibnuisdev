<?php

namespace App\Http\Livewire\Dashboard\Blog;

use App\Models\Blog\Analytics;
use Livewire\Component;

class LastDayVisitor extends Component
{
    /**
     * Render to view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $total_visitor_today = Analytics::where('name', Analytics::LAST_DAY_TOTAL_VISITOR)->first();

        $data = [
            'total_visitor_today' => isset($total_visitor_today->data) ? $total_visitor_today->data : 0
        ];

        return view('livewire.dashboard.blog.last-day-visitor', $data);
    }
}
