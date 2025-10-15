<?php 

use App\Text;

$texts = Text::where('slug','all-programs')->get();

$text_to_array = [];

foreach($texts as $text){
    $text_to_array[$text->title] =$text->text_es;
}

return $text_to_array;