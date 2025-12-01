<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSession extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['date','start','end','link','educator_id'];

    protected $casts = [
        'date' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime',
    ];
}
