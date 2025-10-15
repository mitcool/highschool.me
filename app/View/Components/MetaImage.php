<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Image;

class MetaImage extends Component
{
    public $image;

    public function __construct($nickname)
    {
        $this->image = Image::where('nickname', $nickname)->first();
    }
    
    public function render()
    {
        return view('components.meta-image');
    }
}
