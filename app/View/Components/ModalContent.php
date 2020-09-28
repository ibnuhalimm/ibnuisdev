<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalContent extends Component
{
    public $width;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($size = 'medium')
    {
        switch ($size) {
            case 'small':
                $this->width = 'w-1/4';
                break;

            case 'medium':
                $this->width = 'w-1/3';
                break;

            case 'large':
                $this->width = 'w-3/4';
                break;

            default:
                $this->width = 'w-1/3';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal-content');
    }
}
