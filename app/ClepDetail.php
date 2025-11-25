<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClepDetail extends Model
{
    use HasFactory;

    protected $table = 'clep_details';
    protected $primaryKey = 'course_id';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'course_id',
    ];

    /**
     * The course this CLEP detail belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(CatalogCourse::class, 'course_id');
    }
}
