<?php 

use App\Text;

$texts = Text::where('slug','welcome')->get();

$text_to_array = [];

foreach($texts as $text){
    $text_to_array[$text->title] =$text->text_de;
}

return $text_to_array;