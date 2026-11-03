<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = ['code', 'expired_at', 'is_active'];

    protected $casts = [
        'expired_at' => 'datetime',
        'is_active'  => 'boolean',
    ];

    public function isValid(): bool
    {
        return $this->is_active && (!$this->expired_at || $this->expired_at->isFuture());
    }
}
