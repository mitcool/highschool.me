<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'logout_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'verified_at' => 'datetime',
        'logout_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public static function closeExpiredApprovedSessions($userId = null)
    {
        $lifetime = (int) config('session.lifetime', 120);
        $cutoff = Carbon::now()->subMinutes($lifetime);

        $query = static::where('status', 'approved')
            ->whereNotNull('verified_at')
            ->whereNull('logout_at')
            ->where('verified_at', '<=', $cutoff);

        if (!is_null($userId)) {
            $query->where('user_id', $userId);
        }

        $query->chunkById(100, function ($verifications) use ($lifetime) {
            foreach ($verifications as $verification) {
                $verification->update([
                    'logout_at' => $verification->verified_at->copy()->addMinutes($lifetime),
                ]);
            }
        });
    }

    public function protocolLogoutAt()
    {
        if ($this->logout_at) {
            return $this->logout_at;
        }

        if (!$this->verified_at) {
            return null;
        }

        $lifetime = (int) config('session.lifetime', 120);
        $expiresAt = $this->verified_at->copy()->addMinutes($lifetime);

        return $expiresAt->lte(Carbon::now()) ? $expiresAt : null;
    }

    public function protocolLengthInMinutes()
    {
        $logoutAt = $this->protocolLogoutAt();

        if (!$this->verified_at || !$logoutAt) {
            return null;
        }

        return $this->verified_at->diffInMinutes($logoutAt);
    }
}
