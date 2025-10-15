<?php 

$texts = \App\Text::where('slug','single-blog')->get();
$navigation_texts = [];

foreach($texts as $text){
    $navigation_texts[$text->title] = $text->text_en;  
}

return $navigation_texts;