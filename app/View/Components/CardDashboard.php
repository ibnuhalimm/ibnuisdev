<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardDashboard extends Component
{
    public $text;
    public $number;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text = 'Your Text Here', $number = 0)
    {
        $this->text = $text;
        $this->number = $number;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-dashboard');
    }
}
