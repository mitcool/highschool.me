<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Text;

class ThreeButtons extends Component
{
    public $texts;
    public function __construct()
    {
        $this->texts = Text::where('slug','three-buttons')->pluck('text_en','title'); 
    }
    public function render()
    {
        return view('components.three-buttons');
    }
}
