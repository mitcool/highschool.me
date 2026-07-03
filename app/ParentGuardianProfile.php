<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentGuardianProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'relationship_type',
        'relationship_other',
        'can_make_educational_decisions',
        'has_other_guardian_with_rights',
        'other_guardian_full_name',
        'other_guardian_email',
        'other_guardian_phone',
    ];

    protected $casts = [
        'can_make_educational_decisions' => 'boolean',
        'has_other_guardian_with_rights' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
