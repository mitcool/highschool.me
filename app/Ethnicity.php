<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ethnicity extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function parent_students()
    {
        return $this->hasMany('App\ParentStudent', 'ethnicity_id', 'id');
    }
}
