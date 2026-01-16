<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbassadorRedemption extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'order_id',
        'reward_id',
        'points',
    ];

    /**
     * The user who redeemed the reward
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The redeemed reward
     */
    public function reward()
    {
        return $this->belongsTo(AmbassadorReward::class);
    }

    public function order()
    {
        return $this->belongsTo(AmbassadorRedemptionOrder::class, 'order_id');
    }
}
