<?php 

use App\Text;

$texts = Text::where('slug','sitemap')->get();

$text_to_array = [];

foreach($texts as $text){
    $text_to_array[$text->title] =$text->text_ru;
}

return $text_to_array;