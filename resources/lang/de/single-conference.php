<?php 

$texts = \App\Text::where('slug','single-conference')->get();
$navigation_texts = [];

foreach($texts as $text){
    $navigation_texts[$text->title] = $text->text_de;  
}

return $navigation_texts;