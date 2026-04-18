<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use App\DynamicNews as NewsModel;
use Illuminate\Http\Request;

class News extends Component
{
    public $texts;
    public $last_three_news;
    public function __construct(Request $request)
    {
        $this->last_three_news = NewsModel::orderBy('id','desc')->take(3)->get();
        $this->texts = $request->all()['texts'];      
    }
    public function render()
    {
        return view('components.home.news');
    }
}
