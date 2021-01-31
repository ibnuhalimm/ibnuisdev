<?php

namespace App\Http\Livewire\Dashboard\Blog;

use App\Models\Blog\Analytics;
use Livewire\Component;

class LastMonthVisitor extends Component
{
    /**
     * Render to view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $total_visitor_month = Analytics::where('name', Analytics::LAST_MONTH_TOTAL_VISITOR)->first();

        $data = [
            'total_visitor_month' => isset($total_visitor_month->data) ? $total_visitor_month->data : 0
        ];

        return view('livewire.dashboard.blog.last-month-visitor', $data);
    }
}
