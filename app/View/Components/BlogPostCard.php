<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogPostCard extends Component
{
    public $slug;
    public $image;
    public $title;
    public $date;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($slug, $image, $title, $date)
    {
        $this->slug = $slug;
        $this->image = $image;
        $this->title = $title;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.blog-post-card');
    }
}
