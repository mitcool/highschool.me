<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\DynamicNews;

class DynamicNewsAuthor extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'dynamic_news_authors';

    public $timestamps = false;

    protected $fillable = ['name','description','slug','avatar'];

    public function translated(){
        return $this->hasOne('App\DynamicNewsAuthorTranslation','author_id','id')->where('locale',app()->currentLocale());
    }

    public function all_translations(){
        return $this->hasMany('App\DynamicNewsAuthorTranslation','author_id','id');
    }

    public function total_articles(){
        $total_articles = DynamicNews::where('author_id',$this->id)->count();
        return $total_articles;
    }
}
