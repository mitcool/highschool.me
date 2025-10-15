<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;

class Header extends Component
{
    
    public function render()
    {
        return view('components.header');
    }
}
