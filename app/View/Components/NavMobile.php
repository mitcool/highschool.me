<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;

class NavMobile extends Component
{
    

    public function __construct()
    {
       
    }
    public function render()
    {
        return view('components.nav-mobile');
    }
}
