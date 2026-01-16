<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSpotlight extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
    ];
    
    public function category() {
        return $this->hasOne('App\StudentInSpotlightCategory', 'id', 'category_id');
    }
}
