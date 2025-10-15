<?php 

use App\Text;

$texts = Text::where('slug','accessibility')->get();

$text_to_array = [];

foreach($texts as $text){
    $text_to_array[$text->title] =$text->text_en;
}

return $text_to_array;