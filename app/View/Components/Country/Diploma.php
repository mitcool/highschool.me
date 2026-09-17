<?php

namespace App\View\Components\Country;

use Illuminate\View\Component;

class Diploma extends Component
{
    public $country;
    public function __construct($country)
    {
        $this->country = $country;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.country.diploma');
    }
}
