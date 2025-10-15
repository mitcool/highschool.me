<?php 

use App\Text;

$texts = Text::where('slug','study-financing')->get();

$text_to_array = [];

foreach($texts as $text){
    $text_to_array[$text->title] =$text->text_es;
}

return $text_to_array;