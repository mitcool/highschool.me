<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyConsultation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['date','start','end','link','educator_id','parent_id','request_id'];

    protected $casts = [
        'date' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function parent(){
        return $this->hasOne('App\User','id','parent_id');
    }

    public function educator(){
        return $this->hasOne('App\User','id','educator_id');  
    }
}
