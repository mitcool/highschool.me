<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbassadorRedemptionOrder extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'country',
        'city',
        'address',
        'phone',
        'total_points',
        'status',
        'zip_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function redemptions()
    {
        return $this->hasMany(AmbassadorRedemption::class, 'order_id');
    }
}
