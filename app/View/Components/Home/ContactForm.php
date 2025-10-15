<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use App\Program;
use App\Country;

class ContactForm extends Component
{
    
    public $programs;
    public $countries;
    public function __construct()
    {
        $this->programs  = Program::all();

        $this->countries = request()->segment(1) == 'en' ? Country::orderBy('nicename')->get() :  Country::orderBy('nicename_de')->get();
    }

    public function render()
    {
        return view('components.home.contact-form');
    }
}
