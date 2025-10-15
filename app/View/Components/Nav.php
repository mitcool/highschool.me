<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Study;
use Session;

class Nav extends Component
{   
    public $studies;
    public $border_colors;

    public function __construct()
    {
        $locale = app()->currentLocale();
        $this->studies  = Study::all();
        $this->border_colors = ['#0090FF','#11FF00','#FF4500','#FF00BC','#EFFF00','#000000'];
    }
    public function render()
    {
        return view('components.nav');
    }
}
