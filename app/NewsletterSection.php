<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSection extends Model
{
    use HasFactory;

    protected $table = 'newsletter_sections';
    protected $fillable = ['content','content_de','link','image','newsletter_id'];
}
