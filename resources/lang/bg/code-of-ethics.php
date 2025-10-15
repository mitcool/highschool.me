<?php 

use App\Text;

$texts = Text::where('slug','code-of-ethics')->get();

$text_to_array = [];

foreach($texts as $text){
    $text_to_array[$text->title] =$text->text_bg;
}

return $text_to_array;