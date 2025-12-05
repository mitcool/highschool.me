<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use App\Testimonial;

class Testimonials extends Component
{
    public function __construct()
    {
    }

    public function render()
    {
        return view('components.home.testimonials');
    }
}
