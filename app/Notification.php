<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeUnread($query) {
        return $query->whereNull('read_at');
    }

    public static function add(int $userId, string $message): self{
        return self::create([
            'user_id' => $userId,
            'message' => $message,
        ]);
    }

    public static function addForAdmins(string $message): void {
        $admins = User::where('role_id', 1)->pluck('id');

        if ($admins->isEmpty()) {
            return;
        }

        $now = now();

        $data = $admins->map(function ($adminId) use ($message, $now) {
            return [
                'user_id'    => $adminId,
                'message'    => $message,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        })->toArray();

        self::insert($data);
    }
}
