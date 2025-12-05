<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use App\Program;

class Slogan extends Component
{
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.slogan');
    }
}
