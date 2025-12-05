<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;
use DB;
use App\Study;

class Footer extends Component
{
    
    public function __construct(){
	
    }
   
    public function render()
    {
        return view('components.footer');
    }
}
