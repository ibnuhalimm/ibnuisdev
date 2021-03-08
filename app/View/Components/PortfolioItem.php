<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PortfolioItem extends Component
{
    public $name;
    public $image;
    public $description;
    public $link;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $image
     * @param string $description
     * @param string $link
     * @return void
     */
    public function __construct($name, $image, $description, $link)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.portfolio-item');
    }
}
