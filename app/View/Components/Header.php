<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use App\Notification;
use Session;
use App\Text;

class Header extends Component
{
    public $unreadNotificationsCount;
    public $texts;

    public function __construct() {
        if (Auth::check()) {
            $this->unreadNotificationsCount = Notification::where('user_id', Auth::id())
                ->whereNull('read_at')
                ->count();
        } else {
            $this->unreadNotificationsCount = 0;
        }
        $this->texts = Text::where('slug','header')->pluck('text_en','title'); 
    }
    
    public function render()
    {
        return view('components.header');
    }
}
