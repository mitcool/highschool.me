<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use App\Partner;

class Partners extends Component
{
    public $partners;
    public function __construct()
    {
        $this->partners = Partner::inRandomOrder()->take(3)->get();

    }
    public function render()
    {
        return view('components.home.partners');
    }
}
