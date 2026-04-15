<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;
use App\Text;

class Nav extends Component
{   
    
    public $texts;
    public function __construct()
    {
        $this->texts = Text::where('slug','header')->pluck('text_en','title'); 

    }
    public function render()
    {
        return view('components.nav');
    }
}
