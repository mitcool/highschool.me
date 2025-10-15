<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use App\Testimonial;

class Testimonials extends Component
{
    public $testimonials;
    public function __construct()
    {
        $this->testimonials = Testimonial::inRandomOrder()->take(3)->get();
    }

    public function render()
    {
        return view('components.home.testimonials');
    }
}
