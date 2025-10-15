<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Image;

class ImageComponent extends Component
{

    public $image;
    public $id;
    public $class;
    public $style;
    public $width;
    public $height;
    public $loading;

    public function __construct($nickname,$id="",$class="",$style="",$width="auto",$height="auto",$loading="lazy")
    {
        $this->image = Image::where('nickname', $nickname)->first();
        $image_info = getimagesize(public_path($this->image->src)); 
        $this->class = $class.' h-auto ';
        $this->id = $id;
        $this->style = $style;
        $this->width = $image_info[0];
        $this->height = $image_info[1];
        $this->loading = $loading;
    }
    
    public function render()
    {
        return view('components.image-component');
    }
}
