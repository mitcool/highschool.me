<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use Illuminate\Http\Request;


class Benefits extends Component
{
    public $texts;
    public function __construct(Request $request)
    {
        $this->texts = $request->all()['texts'];       
    }

    public function render()
    {
        return view('components.home.benefits');
    }
}
