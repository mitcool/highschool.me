<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use App\DynamicNews as NewsModel;

class News extends Component
{
    
    public $last_three_news;
    public function __construct()
    {
        $this->last_three_news = NewsModel::orderBy('id','desc')->take(3)->get();
    }
    public function render()
    {
        return view('components.home.news');
    }
}
