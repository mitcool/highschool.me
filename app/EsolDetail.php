<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EsolDetail extends Model
{
    use HasFactory;

    protected $table = 'esol_details';
    protected $primaryKey = 'course_id';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'lld_level',
        'cefr_level',
    ];

    /**
     * The course this ESOL detail belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(CatalogCourse::class, 'course_id');
    }
}
