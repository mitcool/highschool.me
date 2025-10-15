<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;
use DB;
use App\Study;

class Footer extends Component
{
    public $countries;
    public $top_countries;
    public $studies;
    public function __construct(){
		$this->countries = DB::table('countries')->orderBy('nicename_de')->select('phonecode','nicename','nicename_de')->get();
        if(request()->segment(1) == 'en'){
            $this->countries = DB::table('countries')->orderBy('nicename')->select('phonecode','nicename','nicename_de')->get();
        }
       
        $this->top_countries = DB::table('countries')->whereIn('id',[225,226,14,80,206])->orderByRaw("FIELD(id, 225, 226, 14, 80, 206)")->get();
        $this->studies = Study::all();
    }
   
    public function render()
    {
        return view('components.footer');
    }
}
