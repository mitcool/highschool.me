<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Company;

class Companies extends Component
{
    public $companies;
    public function __construct()
    {
        $this->companies = Company::all();
    }
    
    public function render()
    {
        return view('components.companies');
    }
}
