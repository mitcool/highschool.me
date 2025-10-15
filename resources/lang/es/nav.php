<?php 

$texts = \App\Text::where('slug','header-nav')->get();
$navigation_texts = [];

foreach($texts as $text){
    $navigation_texts[$text->title] = $text->text_es;  
}

return $navigation_texts;