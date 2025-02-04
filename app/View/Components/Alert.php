<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $color;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color = 'gray', $title = null)
    {
        $this->color = $color;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
