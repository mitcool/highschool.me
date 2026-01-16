<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpDesk extends Model
{
    use HasFactory;

    protected $fillable = ["title","message" ,"user_id" ,"slug",'is_admin','is_new','related_to','is_parent'];

   
}
