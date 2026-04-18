<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use Illuminate\Http\Request;

class Recognition extends Component
{
    public $texts;
    public function __construct(Request $request)
    {
        $this->texts = $request->all()['texts'];       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.recognition');
    }
}
