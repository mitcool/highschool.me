<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Study;
use Session;

class Nav extends Component
{   
    

    public function __construct()
    {
      
    }
    public function render()
    {
        return view('components.nav');
    }
}
