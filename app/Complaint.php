<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime',
     
    ];

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }

    protected $fillable = ['educator_id','student_id','text','date'];
}
