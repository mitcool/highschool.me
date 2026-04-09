<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginVerification extends Model
{
    protected $fillable = [
        'user_id',
        'verification_token',
        'ip_address',
        'user_agent',
        'pin_code',
        'attempts',
        'status',
        'expires_at',
        'verified_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
