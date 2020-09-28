<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormLabelInline extends Component
{
    public $text;
    public $size;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text = '', $size = 'medium', $required = 'false')
    {
        $this->text = $text;
        $this->size = $size;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-label-inline');
    }
}
