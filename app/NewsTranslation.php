<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    use HasFactory;

    protected $table = 'news_translations';
    public $timestamps = false;


    private function wordsLimit($text, $limit = 50, $end = '...'){
        $text = strip_tags($text);
        $words = explode(' ', $text);
        if($limit < 1 || sizeof($words) <= $limit) {
          return $text;
        }
        $words = array_slice($words, 0, $limit);
        $output = implode(' ' , $words);
        return $output.$end;
      }

    public function short_description(){
        return $this->wordsLimit($this->description,30);
    }
}
