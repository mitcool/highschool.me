<?php

namespace App\View\Components\Country;

use Illuminate\View\Component;

class Steps extends Component
{
    public $country;
    public function __construct($country)
    {
        $this->country = $country;
    }
    
    public function render()
    {
        return view('components.country.steps');
    }
}
