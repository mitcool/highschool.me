<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;
use DB;
use App\Text;

class Footer extends Component
{
    public $texts;
    public function __construct(){
         $this->texts = Text::where('slug','footer')->pluck('text_en','title'); 
    }
   
    public function render()
    {
        return view('components.footer');
    }
}
