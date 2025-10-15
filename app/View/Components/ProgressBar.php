<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProgressBar extends Component
{
    public $step;
    public $width;
    public function __construct($step)
    {
        $this->step = $step;
        $this->width = $this->step * 6.66; 
    }

    public function render()
    {
      
        return view('components.progress-bar');
    }
}
